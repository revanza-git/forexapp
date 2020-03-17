<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate current record
        User::truncate();

        $faker = \Faker\Factory::create();

        //Trying has into a fixed password
        $password = Hash::make('password');
        
        //create admin user
        User::create([
            'name'=>'Administrator',
            'email'=>'admin@test.com',
            'password'=>$password
        ]);

        //Seeder into user database
        for($i=0;$i<10;$i++){
            User::create([
                'name'=>$faker->name,
                'email'=>$faker->email,
                'password'=>$password
            ]);
        }
    }
}
