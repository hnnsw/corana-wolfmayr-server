<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Models\User;
        $admin->username = 'admin';
        $admin->firstname = 'Anton';
        $admin->lastname = 'Admin';
        $admin->gender = 'männlich';
        $admin->socialSecurityNumber = '1234120342';
        $admin->dateOfBirth = Carbon::createFromFormat('Y-m-d', '1942-03-12');
        $admin->phonenumber = 1234567890;
        //$admin->vaccinated = false;
        //$admin->vaccination_id = 1;
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('admin');
        $admin->isAdmin = true;
        $admin->save();

        $user = new \App\Models\User;
        $user->username = 'user';
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('user');
        $user->isAdmin = false;
        $user->save();

        $user2 = new \App\Models\User;
        $user2->username = 'user2';
        $user2->email = 'user2@gmail.com';
        $user2->password = bcrypt('user2');
        $user2->isAdmin = false;
        $user2->save();

        $user3 = new \App\Models\User;
        $user3->username = 'user3';
        $user3->email = 'user3@gmail.com';
        $user3->password = bcrypt('user3');
        $user3->isAdmin = false;
        $user3->save();

        $user4 = new \App\Models\User;
        $user4->username = 'user4';
        $user4->firstname = 'Jane';
        $user4->lastname = 'Doe';
        $user4->gender = 'weiblich';
        $user4->socialSecurityNumber = '6789567';
        $user4->dateOfBirth = Carbon::createFromFormat('Y-m-d', '1949-10-12');
        $user4->phonenumber = 67894567;
        $user4->vaccinated = false;
        $user4->vaccination_id = 2;
        $user4->email = 'janedoe@gmail.com';
        $user4->password = bcrypt('user4');
        $user4->isAdmin = false;
        $user4->save();

        $user5 = new \App\Models\User;
        $user5->username = 'user5';
        $user5->firstname = 'Florian';
        $user5->lastname = 'Huber';
        $user5->gender = 'männlich';
        $user5->socialSecurityNumber = '6789567';
        $user5->dateOfBirth = Carbon::createFromFormat('Y-m-d', '1950-12-10');
        $user5->phonenumber = 67894567;
        $user5->vaccinated = false;
        $user5->vaccination_id = 2;
        $user5->email = 'florianhuber@gmail.com';
        $user5->password = bcrypt('user5');
        $user5->isAdmin = false;
        $user5->save();

        $user6 = new \App\Models\User;
        $user6->username = 'user6';
        $user6->firstname = 'Sabrina';
        $user6->lastname = 'Leitner';
        $user6->gender = 'weiblich';
        $user6->socialSecurityNumber = '234234324';
        $user6->dateOfBirth = Carbon::createFromFormat('Y-m-d', '1989-01-03');
        $user6->phonenumber = 23423423423;
        $user6->vaccinated = true;
        $user6->vaccination_id = 1;
        $user6->email = 'leitnersabsi@gmail.com';
        $user6->password = bcrypt('user6');
        $user6->isAdmin = false;
        $user6->save();

        $user7 = new \App\Models\User;
        $user7->username = 'user7';
        $user7->firstname = 'Peter';
        $user7->lastname = 'Hartmair';
        $user7->gender = 'männlich';
        $user7->socialSecurityNumber = '123123123';
        $user7->dateOfBirth = Carbon::createFromFormat('Y-m-d', '1990-01-03');
        $user7->phonenumber = 2456783456;
        $user7->vaccinated = false;
        $user7->vaccination_id = 3;
        $user7->email = 'peteharti@gmail.com';
        $user7->password = bcrypt('user7');
        $user7->isAdmin = false;
        $user7->save();

        $user8 = new \App\Models\User;
        $user8->username = 'user8';
        $user8->firstname = 'Ludwig';
        $user8->lastname = 'Neuer';
        $user8->gender = 'männlich';
        $user8->socialSecurityNumber = '123123123';
        $user8->dateOfBirth = Carbon::createFromFormat('Y-m-d', '1990-01-03');
        $user8->phonenumber = 4567890;
        $user8->vaccinated = false;
        $user8->vaccination_id = 1;
        $user8->email = 'ludineuer@gmail.com';
        $user8->password = bcrypt('user8');
        $user8->isAdmin = false;
        $user8->save();

        $user9 = new \App\Models\User;
        $user9->username = 'user9';
        $user9->firstname = 'Luise';
        $user9->lastname = 'Mader';
        $user9->gender = 'divers';
        $user9->socialSecurityNumber = '45678456';
        $user9->dateOfBirth = Carbon::createFromFormat('Y-m-d', '1910-01-03');
        $user9->phonenumber = 880892374908;
        $user9->vaccinated = false;
        $user9->vaccination_id = 1;
        $user9->email = 'luise22@gmail.com';
        $user9->password = bcrypt('user9');
        $user9->isAdmin = false;
        $user9->save();
    }
}
