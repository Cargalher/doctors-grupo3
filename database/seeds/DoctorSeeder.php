<?php

use App\User;
use App\Review;
use App\Message;
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
        $coolImages = [
            'img/Alessandro.png',
            'img/Domenico.png',
            'img/GianMarco.png',
            'img/Emanuele.png',
            'img/carmen.png'
        ];

        for ($i = 0; $i < rand(30, 100); $i++) {
            $doctor = new User();
            $doctor->name = $faker->firstname();
            $doctor->lastname = $faker->lastname();

            $doctor->profile_image = $coolImages[rand(0, 4)];

            $doctor->city = $faker->city();
            $doctor->pv = $faker->citySuffix();
            $doctor->address = $faker->address();
            $doctor->email = $faker->email();
            $doctor->password = Hash::make('madeinsud');
            $doctor->save();


            for ($r = 0; $r < rand(2, 5); $r++) {
                $review = new Review();
                $review->name = $faker->name();
                $review->lastname = $faker->lastname();
                $review->vote = rand(1, 5);
                $review->title = $faker->sentence(5);
                $review->body = $faker->text(144);
                $doctor->reviews()->save($review);
            }

            for ($m = 0; $m < rand(2, 5); $m++) {
                $newMessage = new Message();
                $newMessage->name = $faker->firstname();
                $newMessage->lastname = $faker->lastname();
                $newMessage->email = $faker->email();
                $newMessage->phone_number = '333333333';
                $newMessage->text = $faker->text(144);
                $doctor->messages()->save($newMessage);
            }
        }
    }
}
