<?php

namespace Database\Seeders;

use App\Models\State;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class CountryStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = storage_path('asset/countries_states.json');

        if (File::exists($jsonFile)) {
            // Read the file contents
            $data = json_decode(File::get($jsonFile), true);

            // Loop through each country and its associated states
            foreach ($data as $countryData) {
                // Create the country
                $country = Country::create(['name' => $countryData['name']]);

                // Create the associated states for the country
                foreach ($countryData['states'] as $stateData) {
                    State::create([
                        'name' => $stateData['name'],
                        'country_id' => $country->id
                    ]);
                }
            }
        } else {
            $this->command->info('JSON file not found!');
        }
    }
    
}
