<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location = new \App\Models\Location;
        $location->name = 'Volkshaus Dornach';
        $location->zipcode = '4040';
        $location->city = 'Linz';
        $location->address = 'Volkshausstraße 1';
        $location->save();

        $location2 = new \App\Models\Location;
        $location2->name = 'Design Center Linz';
        $location2->zipcode = '4020';
        $location2->city = 'Linz';
        $location2->address = 'Europaplatz 1';
        $location2->save();

        $location3 = new \App\Models\Location;
        $location3->name = 'Gusenhalle';
        $location3->zipcode = '4210';
        $location3->city = 'Gallneukirchen';
        $location3->address = 'Veitsdorfer Weg 1';
        $location3->save();
    }
}
