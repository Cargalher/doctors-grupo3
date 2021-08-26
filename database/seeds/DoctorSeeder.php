<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < rand(30, 100); $i++) {
            $doctor = new User();
            $doctor->name = $faker->firstname();
            $doctor->lastname = $faker->lastname();
            $doctor->address = $faker->address();
            $doctor->email = $faker->email();
            $doctor->password = Hash::make('madeinsud');
            $doctor->save();
        }
    }
}
