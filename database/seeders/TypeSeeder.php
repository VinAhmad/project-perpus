<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Novel', 'code' => 'N'],
            ['name' => 'Komik', 'code' => 'K'],
            ['name' => 'Edukasi', 'code' => 'EDU'],
            ['name' => 'Ensiklopedi', 'code' => 'EN'],
        ];

        foreach ($data as $d){
            DB::table('types')->insert([
                'name' => $d['name'],
                'code' => $d['code'],
            ]);
        }
    }
}
