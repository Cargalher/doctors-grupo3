<?php

use App\User;
use App\Review;
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


            for ($r = 0; $r < rand(2, 5); $r++) {
                $review = new Review();

                $review['user_id']=$doctor['id'];
                $review->rv_vote = rand(1, 5);
                $review->rv_title = $faker->sentence(5);
                $review->rv_content = $faker->text(144);
                $review->save();
            }
        }
    }
}
