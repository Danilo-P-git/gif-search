<?php

use Illuminate\Database\Seeder;
Use App\Gif;
class GifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $randomProviders = [
            [
                "slug" => "giphy",
                "description"=> "Giphy, styled as GIPHY, is an American online database and search engine that allows users to search for and share short looping videos with no sound, that resemble animated GIF files.",
                "credential" => [
                    [
                        "username" => "danilopatane98@tiscali.it",
                        "password" => "Danilopatane1!",
                        "api_key" => "XKr0PsRKWR2zKUX5kLJPpy0OrUUCnXnp"
                    ]

                ]
            ],

            [
                "slug" => "tenor",
                "description"=> "Tenor is an online GIF search engine and database. Its main product is GIF Keyboard, which is available in iOS, Android and macOS platforms. GIF search engine giant Giphy is one of the major competitors of Tenor",
                "credential" => [
                    [
                        "username" => "danilopatane98@tiscali.it",
                        "password" => "Danilopatane1!",
                        "api_key" => "5GD7GSJ75A4Z"
                    ]

                ]
            ],
        ];


        foreach ($randomProviders as $provider) {

            $newProvider = new Gif;
            $newProvider->slug = $provider["slug"];
            $newProvider->description = $provider["description"];
            $newProvider->credential = json_encode($provider["credential"]);
            $newProvider->save();
        }
    }
}
