<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
    	$this->call(UserTableSeeder::class);
    	$this->call(CateringTableSeeder::class);
    	$this->call(TestimoniTableSeeder::class);
    	$this->call(OrderTableSeeder::class);
    }
}
