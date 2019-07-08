<?php

use Illuminate\Database\Seeder;
use App\Order;
use Illuminate\Support\Facades\DB;

class OrderTableSeeder extends Seeder {
	public function run() {
        DB::table('orders')->insert([
        	[
        		'user_id'		 => 2,
        		'catering_id'	 => 1,
        		'no_pesanan'	 => '001220419',
        		'jumlah_pesanan' => 1,
        		'waktu_pesanan'	 => '30 Menit',
                'alamat_pesanan' => 'Samarinda',
        		'total'			 => 20000,
        	],
        	[
        		'user_id'		 => 2,
        		'catering_id'	 => 2,
        		'no_pesanan'	 => '002220419',
        		'jumlah_pesanan' => 5,
        		'waktu_pesanan'	 => '30 Menit',
                'alamat_pesanan' => 'Samarinda',
        		'total'			 => 100000,
        	],
        	[
        		'user_id'		 => 3,
        		'catering_id'	 => 3,
        		'no_pesanan'	 => '003220419',
        		'jumlah_pesanan' => 100,
        		'waktu_pesanan'	 => '2 Hari',
                'alamat_pesanan' => 'Samarinda',
        		'total'			 => 3000000,
        	],
        ]);
    }
}
