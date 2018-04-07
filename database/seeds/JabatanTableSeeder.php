<?php

use Illuminate\Database\Seeder;
use App\Jabatan;

class JabatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatans = [
        	'Pemimpin Redaksi',
        	'Wakil Pemimpin Redaksi',
        	'Bendahara',
        	'Tata Usaha',
        	'Desain Sampul',
        ];

        foreach ($jabatans as $jabatan) {
        	Jabatan::create(['name' => $jabatan]);
        }
    }
}
