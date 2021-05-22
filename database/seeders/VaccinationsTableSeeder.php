<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $vaccination->fromTime = Carbon::createFromFormat('Y-m-d H:i:s', '2022-01-01 08:00:00');
        $vaccination->toTime = Carbon::createFromFormat('Y-m-d H:i:s', '2022-01-01 12:00:00');
        $vaccination->maxParticipants = 5;
        $location = \App\Models\Location::all()->first();
        $vaccination->location()->associate($location);
        $vaccination->save();

        $vaccination2 = new \App\Models\Vaccination();
        $vaccination2->dateOfVaccination = date_create('2021-10-11');
        $vaccination2->fromTime = Carbon::createFromFormat('Y-m-d H:i:s', '2021-10-11 07:30:00');
        $vaccination2->toTime = Carbon::createFromFormat('Y-m-d H:i:s', '2021-10-11 15:00:00');
        $vaccination2->maxParticipants = 10;
        $location = \App\Models\Location::all()->where("name", "Gusenhalle")->first();
        $vaccination2->location()->associate($location);
        $vaccination2->save();

        $vaccination3 = new \App\Models\Vaccination();
        $vaccination3->dateOfVaccination = date_create('2022-12-11');
        $vaccination3->fromTime = Carbon::createFromFormat('Y-m-d H:i:s', '2021-10-11 09:30:00');
        $vaccination3->toTime = Carbon::createFromFormat('Y-m-d H:i:s', '2021-10-11 13:00:00');
        $vaccination3->maxParticipants = 5;
        $location = \App\Models\Location::all()->where("name", "Magistrat Villach")->first();
        $vaccination3->location()->associate($location);
        $vaccination3->save();

        $vaccination4 = new \App\Models\Vaccination();
        $vaccination4->dateOfVaccination = date_create('2022-02-02');
        $vaccination4->fromTime = Carbon::createFromFormat('Y-m-d H:i:s', '2021-10-11 09:00:00');
        $vaccination4->toTime = Carbon::createFromFormat('Y-m-d H:i:s', '2021-10-11 12:00:00');
        $vaccination4->maxParticipants = 15;
        $location = \App\Models\Location::all()->where("name", "Magistrat Wien")->first();
        $vaccination4->location()->associate($location);
        $vaccination4->save();

        $vaccination5 = new \App\Models\Vaccination();
        $vaccination5->dateOfVaccination = date_create('2021-01-03');
        $vaccination5->fromTime = Carbon::createFromFormat('Y-m-d H:i:s', '2021-10-11 08:00:00');
        $vaccination5->toTime = Carbon::createFromFormat('Y-m-d H:i:s', '2021-10-11 12:00:00');
        $vaccination5->maxParticipants = 8;
        $location = \App\Models\Location::all()->where("name", "Design Center Linz")->first();
        $vaccination5->location()->associate($location);
        $vaccination5->save();
    }
}
