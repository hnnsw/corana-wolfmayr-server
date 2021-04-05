<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VaccinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vaccination = new \App\Models\Vaccination();
        $vaccination->dateOfVaccination = date_create('2022-01-01');
        $vaccination->maxParticipants = 5;
        $location = \App\Models\Location::all()->first();
        $vaccination->location()->associate($location);

        $vaccination->save();
    }
}
