<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParserApiTest extends TestCase
{
    private const URL = 'url';
    private const RESPONSE = 'response';

    public function apiProvider(): array{
        return [
            [
                self::URL => "https://appjobs-general.s3.eu-west-1.amazonaws.com/test-xml-feeds/feed_2.xml",
                self::RESPONSE => [
                    "products" => [
                        "product" => [
                            "data_feed_id" => "41399",
                            "aw_deep_link" => "https://www.awin1.com/pclick.php?p=30889002183&a=764485&m=18964",
                            "merchant_product_id" => "drivers_nl_nl_amstelveen",
                            "search_price" => "0.01",
                            "aw_image_url" => "https://images2.productserve.com/?w=200&h=200&bg=white&trim=5&t=letterbox&url=ssl%3Acrawl-it.ess.nl%2Ffeeds%2FTakeaway_FTP%2Flogo.jpg&feedId=41399&k=09d93586d17e19091ebf4e6d4f9e02881038d7ea",
                            "region" => "Amstelveen",
                            "merchant_image_url" => "https://crawl-it.ess.nl/feeds/Takeaway_FTP/logo.jpg",
                            "description" => "Wil je betaald worden om in je stad rond te rijden? En ben je op zoek naar een stabiele baan als Bezorger met een vast uurloon en verzekering? Dan is het tijd om te solliciteren bij Thuisbezorgd.nl!  Onderweg Als onze Koerier bezorg je heerlijke gerechten in jouw stad - je haalt ze op bij het restaurant en brengt ze naar onze hongerige klanten. Wij bieden de mogelijkheid om parttime en in het weekend te werken en het is zo leuk en gemakkelijk als het klinkt!  Wij maken je het leven gemakkelijker, door:  - Je te voorzien van de benodigde uitrusting,  - Je te begeleiden met onze app terwijl jij door de stad rijdt,     Onze Fietskoerier:  - Is minimaal 16 jaar oud.  - Is super servicegericht en bezorgt met een glimlach.  - Beschikt over een smartphone (met 4G!) voor de navigatie.  - Houdt zich aan de verkeersregels.  - Is beschikbaar op één doordeweekse avond en één avond in het weekend.    Over het salaris als Bezorger bij Thuisbezorgd.nl:  - Een vast uurloon - van €13,34 bruto per uur, vanaf 21 jaar, inclusief vakantiegeld en vakantie-uren.  - Een orderbonus, per geaccepteerde order, als je werkt tussen 17 en 21 uur van tussen de 1 en 2 euro. Bezorg je tijdens deze uren bijv 8 orders kun je tussen de 8 en 16 euro extra verdienen, onafhankelijk van je leeftijd.   Overige voordelen als Bezorger bij Thuisbezorgd.nl: - Arbeidscontract en verzekering.  - Flexibiliteit en een stabiele planning: wij garanderen je tot 40 werkuren per week. Probeer een van onze vaste contracten met 16, 24, 32 en 40 gegarandeerde uren en diensten per week.  - Ondersteuning van het team wanneer je dit nodig hebt. De kans om buiten te werken en je stad op je duimpje te leren kennen     Start als Bezorger. Solliciteer nu!",
                            "merchant_name" => "Takeaway Recruitment NL",
                            "category_name" => [
                            ],
                            "delivery_cost" => [
                            ],
                            "language" => "nl",
                            "display_price" => "EUR0.01",
                            "location" => "NL",
                            "product_name" => "Bezorger",
                            "merchant_id" => "18964",
                            "category_id" => "0",
                            "currency" => "EUR",
                            "last_updated" => [
                            ],
                            "aw_product_id" => "30889002183",
                            "merchant_category" => [
                            ],
                            "store_price" => [
                            ],
                            "merchant_deep_link" => "https://www.thuisbezorgd.nl/bezorger?city=Amstelveen"
                        ]
                    ]
                ],
            ],
            [
                self::URL => "https://appjobs-general.s3.eu-west-1.amazonaws.com/test-xml-feeds/feed_3.xml",
                self::RESPONSE => [
                        "jobs" => [
                            "job" => [
                                "location" => "AL - Auburn",
                                "title" => "Grubhub Delivery Driver - Be on YOUR Schedule and Earn BIG!",
                                "city" => "Opelika",
                                "state" => "AL",
                                "zip" => "36803",
                                "country" => "United States",
                                "job_type" => "Contract",
                                "posted_at" => "2021-12-31",
                                "job_reference" => "6354_10011",
                                "company" => "Grubhub",
                                "mobile_friendly_apply" => "No",
                                "category" => [
                                ],
                                "html_jobs" => "Yes",
                                "url" => "https://click.appcast.io/track/11n9uda?cs=dm5&exch=42&jg=1kcm&bid=7kevYlsdeP4FsBUcETdrVA==",
                                "body" => "<p><strong>Grubhub Delivery Partner</strong></p>
<p>Apply to be a delivery partner with Grubhub and work on your own time!<br /><br />Grubhub needs delivery partners like you! Are you looking for a flexible way to earn extra cash? Deliver food from local restaurants to diners in your community. <br /><br /><strong>Why deliver with Grubhub?</strong></p>
<ul>
<li>Choose your own schedule.</li>
<li>Earn money with every delivery and every mile you drive.</li>
<li>Keep 100% of your tips. No exceptions.</li>
<li>Make money on your terms—no passengers, no small talk.</li>
<li>No resume, interview or delivery experience required.</li>
</ul>
<p><strong>Sound good? Here’s what you need to get started.</strong></p>
<ul>
<li>Car (or bike in select areas).</li>
<li>A valid driver’s license and auto insurance for drivers.</li>
<li>A valid state I.D. or driver’s license for bike riders.</li>
<li>A smartphone.</li>
</ul>
<p>All delivery partners must be at least 18 years of age with at least 1-year valid license or 19 years of age with 2 years valid license. 21+ in select markets.<br /><br />Grubhub is the nation's leading online and mobile food ordering and delivery marketplace, serving more than 1,700 U.S. cities and London. Partnering with Grubhub is a great opportunity for anyone looking for a flexible schedule. Grubhub delivery partners are independent contractors, not employees of Grubhub. Delivery partners must have a valid driver's license and minimum auto insurance. Delivery partners will use their own reliable car or bike, iPhone or Android phone and their data and text plan. Previous delivery experience is not required, but we encourage drivers and bikers from other delivery or ridesharing services such as UberEATS, Sprig, Caviar, Munchery, Eat24, DoorDash, Google Express, AmazonFresh, Instacart, Lyft, Sidecar, Maple, Munchery, Amazon, Uber, Waitr, Bite Squad and Bird. Let's get you on the road. Apply today! Hourly minimum available in select markets when certain conditions are met. <br /><br />We are focused on prioritizing the health and safety of our delivery partners, diners, and restaurant partners. Based on guidance from the Centers for Disease Control and Prevention (CDC), we recommend all delivery partners take <a>proactive measures and offer </a><a>contact-free delivery. </a></p>",
                                "cpc" => "0.28",
                                "logo" => "https://i.imgur.com/aqgWW34_d.jpg?maxwidth=520&shape=thumb&fidelity=high"
                            ]
                        ]
                    ],
            ],
            [
                self::URL => "https://appjobs-general.s3.eu-west-1.amazonaws.com/test-xml-feeds/feed_4.xml",
                self::RESPONSE => [
                    "jobs" => [
                        "job" => [
                            "referenceId" => "109147",
                            "title" => "Amazon Delivery Driver",
                            "company" => "Amazon Flex",
                            "description" => "Amazon Flex is hiring now in Prescott, AZ. With Amazon Flex, you can earn money for delivering parcels with your own car, on your own schedule, any time you like – just select available hourly blocks, decide if the shift length and payment suit you, and if so, hit the road. <p> Amazon Flex drivers earn between $18 to $25 per hour depending on the location + tips. Since Amazon is an ecommerce giant, you’ll never run out of tasks to complete. <p> In order to start, you have to be at least 21 years of age, have a smartphone, own vehicle and drivers license. <p> Interested? Sign up and start working immediately!",
                            "city" => "Prescott",
                            "state" => "AZ",
                            "country" => "United States",
                            "education" => "any",
                            "experience" => "any",
                            "jobType" => "part-time, temporary",
                            "posterType" => "recruiter",
                            "salary" => "75",
                            "postDate" => "2022-01-03T01:15:09-04:00",
                            "url" => "https://www.appjobs.com/redirect/prescott-az/amazon-flex?referral_id=bf21a9e8fb2316&utm_source=MyJobHelper&utm_medium=cpc&utm_campaign=United_States_EN",
                            "categories" => "delivery jobs",
                            "cpc" => "0.39"
                        ]
                    ]
                ]
            ],
            [
                self::URL => "https://appjobs-general.s3.eu-west-1.amazonaws.com/test-xml-feeds/feed_5.xml",
                self::RESPONSE => [
                    "jobs" => [
                        "job" => [
                            "jobid" => "0004068c6405",
                            "company" => "Asda",
                            "city" => "Harrogate",
                            "state" => "England",
                            "country" => "gb",
                            "description" => "<b>Customer Delivery Driver - Harrogate</b><br /><br /><p>To be employed in this role you must have held a full driving licence for at least one year, and be able to drive a 3.5 ton automatic van. You must also have no more than six points on your licence and pass a basic level safeguarding check.</p><strong>About the Role</strong><p>A great customer experience. That's what our drivers are out to deliver.</p><p>From loading up, fuelling and checking the van for the next route, or giving a customer a call so they know what time their shopping will arrive, everything we do is with our customers in mind.</p><p>Join our growing delivery team, and you'll be the face of Asda for our home shopping customers. You're in the driving seat, spending your day greeting our customers and delivering their shopping on-time with lots of Asda personality.</p><p>When you're not on the road, you'll make sure your van is clean and fit for the next delivery (don't worry, you don't need to be an expert mechanic - we'll give you all the training you need) and when we're really busy, you'll be asked to help your team, picking and packing online orders.</p><p>We'll work with you on your shifts, but the chances are you'll have to work some evenings and weekends and we may need to be flexible with your work pattern - there's something to suit everyone.</p><strong>About You</strong><p>When you're on the road, you'll need to be organised and because you'll be representing Asda, we'll expect you to be an excellent ambassador for the brand.</p><p>With that in mind, the personal qualities you bring to the role will be every bit as important as your skills and attitude. Friendly and approachable, you'll be the kind of person who'll put our customers first and do whatever it takes to make their home shopping experience the best it can be.</p><strong>Your Benefits</strong><p>Alongside a competitive salary, you'll get lots of other great benefits too, including 10% off your Asda shopping, a pension scheme, bonus scheme and discounts across a range of services and activities, from airport parking to theme parks and cinemas.</p><p>Apply today by completing an online application...</p>",
                            "date" => "2021-12-24T16:13:05Z",
                            "role" => "Customer Delivery Driver - Harrogate",
                            "jobtype" => "Full Time",
                            "currency" => "EUR",
                            "cpc" => "0.107",
                            "url" => "https://uk.talent.com/redirect?id=0004068c6405&source=appjobs&utm_source=partner&utm_medium=appjobs&puid=bddgfddg3deg3dec3deg3dea3de8gadd9dda3dec8ddgaddbbed3bddffddgeed2fdd9ced3acdbfbdb3bee&cg=talent",
                            "logo" => "https://cdn-dynamic.talent.com/ajax/img/get-logo.php?empcode=clickcast-jobswipe-uk-all-jobs&empname=Asda&v=024"
                        ]
                    ]
                ]
            ],
            [
                self::URL => "https://appjobs-general.s3.eu-west-1.amazonaws.com/test-xml-feeds/feed_6.xml",
                self::RESPONSE => [
                    "jobs" => [
                        "job" => [
                            "id" => "317871",
                            "url" => "https://www.appjobs.com/wilsonville-or/instacart?referral_id=bf21a9e8fb2210&amp;utm_source=sercanto&amp;utm_medium=cpc&amp;utm_campaign=United_States_EN&amp;utm_content=paid",
                            "title" => "Grocery shopper",
                            "content" => "Deliver groceries in Wilsonville, OR and earn around $15 an hour with Instacart. &lt;p&gt;You decide which jobs fit in your schedule and when you want to work picking up and dropping off groceries. &lt;p&gt;The requirements to be able to work with Instacart are: 2 years of driving experience, a clean driving record, being 21 years or older, as well as having a car for deliveries. ",
                            "date" => "2021-12-28 00:00:00",
                            "city" => "Wilsonville, OR",
                            "category" => "Part time Jobs",
                            "region" => "United States",
                            "salary" => "Varies by location and work hours",
                            "salary_currency" => "USD",
                            "company" => "Instacart",
                            "cpc" => "0.6",
                            "contract" => "Contract"
                        ]
                    ]
                ]
            ],
        ];
    }

    /** @dataProvider apiProvider*/
    public function testApi(string $url, array $jsonValidation)
    {
        $response = $this->call('GET',route('api.parsexml'),[ 'url' => $url ]);

        $response->assertStatus(200)
            ->assertExactJson($jsonValidation);
    }
}
