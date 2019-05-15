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
        $faker = Faker\Factory::create('ja_JP');
        
        // user:1
        DB::table('users')->insert([
           'name' => 'exampleJP',
           'email' => 'example@example.jp',
           'password' => bcrypt('foobar'),
           'lang' => 'ja',
           'email_verified_at' => $faker->dateTime(),
           'created_at' => $faker->dateTime(),
           'updated_at' => $faker->dateTime(),
        ]);
        
        // user:2
        DB::table('users')->insert([
            'name' => 'exampleEN',
            'email' => 'example@example.en',
            'password' => bcrypt('foobar'),
            'lang' => 'en',
            'email_verified_at' => $faker->dateTime(),
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
         ]);
        
        // user:3-20
        for( $i = 3 ; $i <= 20 ; $i++ )
        {
            DB::table('users')->insert([
                'name' => $faker->unique()->userName(),
                'email' => $faker->unique()->email(),
                'password' => bcrypt('foobar'),
                'lang' => $faker->randomElement(['en', 'ja']),
                'email_verified_at' => $faker->dateTime(),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
