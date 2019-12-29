<?php

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
        DB::table('users')->insert(
            [
                'first_name' => 'Eliza',
                'last_name' => 'Ahmed',
                'email' => 'elizarafee@gmail.com',
                'password' => Hash::make('password'),
                'is_admin' => 1
            ]
        );

        DB::table('users')->insert(
            [
                'first_name' => 'Hasan',
                'last_name' => 'Tareque',
                'email' => 'hmtareque@gmail.com',
                'password' => Hash::make('hasan076'),
                'is_admin' => 1
            ]
        );

        $faker = \Faker\Factory::create();

        for($i=1; $i<=20; $i++) {
            DB::table('users')->insert(
                [
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'email' => $faker->safeEmail,
                    'password' => Hash::make('password')
                ]
            );
        }
    }
}
