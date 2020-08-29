<?php

use Illuminate\Database\Seeder;
use App\Models\Setup\Config;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->truncate();

        $config = [
	           'name' => 'Shop Name',
	           'mobile' => '01921821909',
	           'email' => 'shop@gmail.com',
	           'address' => 'Dhaka, Bangladesh'
        ];

        Config::create($config);
    }
}
