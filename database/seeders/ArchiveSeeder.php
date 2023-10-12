<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArchiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Surat Pinjam - Naruto Shippudden', 'archive_number' => '000972', 'book_id' => 1],
            ['name' => 'Surat Pinjam - Bumi', 'archive_number' => '000821', 'book_id' => 2],
            ['name' => 'Surat Pinjam - Matematika', 'archive_number' => '000234', 'book_id' => 3],
            ['name' => 'Surat Pinjam - Sejarah Dunia', 'archive_number' => '000234', 'book_id' => 4],
        ];

        foreach ($data as $d){
            DB::table('archives')->insert([
                'name' => $d['name'],
                'archive_number' => $d['archive_number'],
                'book_id' => $d['book_id']
            ]);
        }
    }
}
