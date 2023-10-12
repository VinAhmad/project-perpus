<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookVisitorSeeder extends Seeder
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
            DB::table('book_visitor')->insert([
                'description' => "Data Peminjaman ke ". $i+1,
                'book_id' => $faker->numberBetween($min = 1, $max = 4),
                'visitor_id' => $faker->numberBetween($min = 1, $max = 24),
                'created_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
            ]);
        }
    }
}
