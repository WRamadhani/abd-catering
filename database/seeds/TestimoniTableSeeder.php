<?php

use Illuminate\Database\Seeder;
use App\Testimoni;
use Illuminate\Support\Facades\DB;

class TestimoniTableSeeder extends Seeder {
    public function run() {
        DB::table('testimonis')->insert([
        	[
        		'user_id'	=> 2,
        		'deskripsi'	=> 'Wah, nasi gorengnya enak sekali! Mantep.',
        	],
        	[
        		'user_id'	=> 2,
        		'deskripsi'	=> 'Gelo, 2uenak tenan.',
        	],
			[
				'user_id'	=> 3,
        		'deskripsi'	=> 'Steak harga yang murah namun rasa yang mewah.',
			],
        ]);
    }
}
