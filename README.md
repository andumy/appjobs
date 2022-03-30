# About
Andrei Dumitrescu AppJobs challenge submission

# Requirments 
- Docker + Docker-compose

or

- LAMP setup

# Installation
Run `make start` in the root folder. 

If `make` cannot be run for various reasons run manually the following commands; 

- `docker-compose up -d`
- `docker exec -u appjobsuser:appjobsgroup appjobs-php composer install`
- `docker exec -u appjobsuser:appjobsgroup appjobs-php php artisan migrate:fresh --seed --force`

# Challenge 1 "City Replacement"
## Solution
In order to apply the fix run

`make solve` or `docker exec -u appjobsuser:appjobsgroup appjobs-php php artisan clean:artifacts`

## Solution Approach
The solution loads chunks of data () from db in order to prevent memory issues, parse it and update it back.
The detecting algorithm (`OffersCleanerService::extractTextArtifacted`) makes usage of the corruption pattern.

For any given text with `n` amount of characters, the corrupted text will have `n+1` occurrences of the infection word.
Knowing this, we can consider the infected string made out of `n+1` groups of infected word + character, except for the last group where we don't always have an extra character.

> Example:
>
> Original text: "The text"
>
> Infected Word: "Corsico"
>
> Infected text "CorsicoTCorsicohCorsicoeCorsico CorsicotCorsicoeCorsicoxCorsicotCorsico"
>
> Infected text grouped : "(CorsicoT)(Corsicoh)(Corsicoe)(Corsico )(Corsicot)(Corsicoe)(Corsicox)(Corsicot)(Corsico)"

> As you can see, the last group can or cannot consist only from the word `Corsico`

The text therefore is infected if the length is equal with `((n+1)*infected word length)-1` or `((n+1)*infected word length)`. Knowing this we can just replace all occurrences of the infected word with an empty character and save it back to db.

## Additional optimisation
For huge databases, even with proper chunking optimisation this might still be an intensive process.
An extra layer of optimisation would consist in attaching a queueing messaging system like RabbitMq and split the chunks in parallel processes consumed by multiple workers.

## Important files
- `App\Http\Services\OffersCleanerService` - Service responsible for detection and fix of the artifacts;
- `Database\Factories\OfferFactory` - Faker based generator with variable percentage of artifact;
- `App\Console\Commands\CleanArtifacts` - Command responsible with launching the correction process;

# Challenge 2 "XML Parser"
## Solution Approach
Right of the bat, we observe the large size of the XMLs. This means that we cannot parse the entire XML and isolate the first repetitive node.
For that reason we should lazy load the XML as a stream, byte by byte and detect what type of tag we encounter.
The algorithm runs until it finds a starting tag already existent on the same depth.

The actual complexity of the task is treating all the edge cases in parsing the XML.

The flow could be summarized as it follows:
1. Load the XML from the given url
2. Read 1 byte at a time and detect if we're hitting a starting tag or a closing tag storing the current tag in a buffer
3. Check if we've hit a starting tag, if it already exists on the current level(depth). If so, then stop reading from file and proceed with **6.**
4. If not, append the buffer data to the new filtered XML. Some preconditions are applied in order to prevent the addition of meta tags.
5. Increase or decrease the level(depth) based on the tag type, and keep track of the current tag. From here start again from **2.**
6. Once we stopped reading from the file some escape rules are applied
7. Based of the level at which we stopped reading the XML, we close the open tags if it's necessary
8. Convert the filtered XML to Json and return it as an api response.

## Important files
- `App\Http\Services\ParserService` - Service responsible for XML parsing and node isolation;
- `App\Http\Requests\XmlParseRequest` - Request validator for api endpoint;
- `App\Dto\XmlStateDto` - Dto responsible with storing the filtered XML state;
- `Tests\Feature\ParserApiTest` - Feature test, testing the api response;

## Alternative solution
Perhaps an alternative solution could be using a recursive approach, treating the XML as a graph and navigating in depth in order to extract the data from it. 

## Tests
In order to run the feature tests you can run `make test`


