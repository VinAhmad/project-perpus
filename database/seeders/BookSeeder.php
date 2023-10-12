<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title' => 'Naruto Shippudden', 'author' => 'Masashi Kishimoto', 'year' => '2012', 'publisher' => 'Shueisha', 'type_id' => 2],
            ['title' => 'Bumi', 'author' => 'Tere Liye', 'year' => '2014', 'publisher' => 'Gramedia', 'type_id' => 1],
            ['title' => 'Matematika', 'author' => 'Budi', 'year' => '2017', 'publisher' => 'Budi Corp', 'type_id' => 3],
            ['title' => 'Sejarah Dunia', 'author' => 'Andi', 'year' => '2015', 'publisher' => 'Andi Jaya', 'type_id' => 4],
        ];

        foreach ($data as $d){
            DB::table('books')->insert([
                'title' => $d['title'],
                'author' => $d['author'],
                'year' => $d['year'],
                'publisher' => $d['publisher'],
                'type_id' => $d['type_id']
            ]);
        }
    }
}
