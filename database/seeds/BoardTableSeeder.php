<?php

use Illuminate\Database\Seeder;
use App\Models\Setup\Board;

class BoardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boards')->truncate();
        $levels = [
        	[
	           'name' => 'Dhaka',
               'created_by' => 1,
            ],
            [
	           'name' => 'Chittagong',
               'created_by' => 1
            ],
            [
	           'name' => 'Comilla',
               'created_by' => 1
            ],
            [
	           'name' => 'Barisal',
               'created_by' => 1
            ]
        ];

        foreach ($levels as $key=>$value){
        Board::create($value);
        }
    }
}
