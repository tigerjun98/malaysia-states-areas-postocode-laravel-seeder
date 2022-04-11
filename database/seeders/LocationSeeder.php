<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // feel free to remove the state you don't want to create.
        $states = ['Perak', 'Penang', 'Pahang', 'Putrajaya', 'Perlis', 'Kedah', 'Sarawak', 'Sabah', 'Sembilan', 'Selangor', 'Johor', 'Kelantan', 'KL', 'Labuan', 'Terengganu', 'Melaka',];

        foreach ($states as $state) {

            // Path to get state data. All data is stored under Models/Malaysia
            $path = 'App\Models\Malaysia\\'.$state;

            foreach ($path::getList() as $item) {
                // Change the 'Location' to the Models you want to store

                Location::create([
                    'country'   => 'malaysia',
                    'state'     => strtolower($item[0]),
                    'area'      => strtolower($item[1]),
                    'postcode'  => strtolower($item[2]),
                    'location'  => strtolower($item[3]),
                ]);
            }

            $this->command->info('Finish seeder for '.$state);
        }
    }
}
