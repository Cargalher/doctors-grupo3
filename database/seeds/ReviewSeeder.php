<?php

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
        for ($r = 0; $r < rand(2, 5); $r++) {
            $review = new Review();
            $review->name = $faker->name();
            $review->lastname = $faker->lastname();
            $review->vote = rand(1, 5);
            $review->title = $faker->sentence(5);
            $review->body = $faker->text(144);
            // $doctor->reviews()->save($review)
            $review->save();
        }
    }
}
