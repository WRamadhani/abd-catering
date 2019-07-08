<?php

use Illuminate\Database\Seeder;
use App\Catering;
use Illuminate\Support\Facades\DB;

class CateringTableSeeder extends Seeder {
    public function run() {
        DB::table('caterings')->insert([
        	[
        		'nama' => 'Nasi Goreng, Baso Ayam',
        		'Paket' => 'Hemat',
        		'Harga' => 50000,
        	],
        	[
        		'nama' => 'Nasi Kuning',
        		'Paket' => 'Hemat',
        		'Harga' => 20000,
        	],
        	[
        		'nama' => 'Steak Ayam, Barbeque',
        		'Paket' => 'Lengkap',
        		'Harga' => 30000,
        	],
        ]);
    }
}
