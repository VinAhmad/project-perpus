<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i <= 23; $i++) {
            DB::table('visitors')->insert([
                'name' => $faker->name,
                'address' => $faker->address,
                'email' => $faker->safeEmail,
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}
