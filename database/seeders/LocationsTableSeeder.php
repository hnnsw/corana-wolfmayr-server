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

        $location4 = new \App\Models\Location;
        $location4->name = 'Magistrat Villach';
        $location4->zipcode = '9500';
        $location4->city = 'Villach';
        $location4->address = 'Rathausplatz 1';
        $location4->save();

        $location5 = new \App\Models\Location;
        $location5->name = 'Magistrat St. Pölten';
        $location5->zipcode = '3100';
        $location5->city = 'St. Pölten';
        $location5->address = 'Rathausplatz 1';
        $location5->save();

        $location6 = new \App\Models\Location;
        $location6->name = 'Magistrat Salzburg';
        $location6->zipcode = '5020';
        $location6->city = 'Salzburg';
        $location6->address = 'Schwarzstraße 44';
        $location6->save();

        $location7 = new \App\Models\Location;
        $location7->name = 'Gesundheitsamt Graz';
        $location7->zipcode = '8010';
        $location7->city = 'Graz';
        $location7->address = 'Schmiedgasse 26';
        $location7->save();

        $location8 = new \App\Models\Location;
        $location8->name = 'Amt der Tiroler Landesregierung';
        $location8->zipcode = '6901';
        $location8->city = 'Bregenz';
        $location8->address = 'Landhaus Bregenz';
        $location8->save();

        $location9 = new \App\Models\Location;
        $location9->name = 'Magistrat Wien';
        $location9->zipcode = '1030';
        $location9->city = 'Wien';
        $location9->address = 'Thomas-Klestil-Platz 8/2';
        $location9->save();
    }
}
