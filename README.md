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

