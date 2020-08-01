<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 10; $i++) {
	        $faker = Faker::create();

	        User::create([
	            'first_name'=>  $faker->firstName,
	            'last_name' =>  $faker->lastName,
	            'email'     =>  $faker->firstName."@".$faker->lastName.".com",
	            'password'  =>  bcrypt('secret'),
	            'address'   =>  $faker->name." adres",
	            'city'      =>  $faker->name." city",
	            'country'   =>  $faker->name." country",
	        ]);
    	}
    }
}
