<?php

use Illuminate\Database\Seeder;
use App\Message;
use App\User;
use Faker\Generator as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($m = 0; $m < rand(2, 5); $m++) {
            $newMessage = new Message();
            $newMessage->name = $faker->firstname();
            $newMessage->lastname = $faker->lastname();
            $newMessage->email = $faker->email();
            $newMessage->phone_number = '333333333';
            $newMessage->text = $faker->text(144);
            $newMessage->save();
        }
    }
}
