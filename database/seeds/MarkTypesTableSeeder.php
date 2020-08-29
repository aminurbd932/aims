<?php

use Illuminate\Database\Seeder;
use App\Models\Setup\MarkType;

class MarkTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mark_types')->truncate();
        $mark_types = [
        	[
	           'name' => 'Creative',
	           'short_name' => 'C',
               'created_by' => 1,
            ],
            [
	           'name' => 'Objective',
	           'short_name' => 'O',
               'created_by' => 1
            ],
            [
	           'name' => 'Practical',
	           'short_name' => 'P',
               'created_by' => 1
            ],
            [
	           'name' => 'SBA',
	           'short_name' => 'SBA',
               'created_by' => 1
            ]
        ];

        foreach ($mark_types as $key=>$value){
        MarkType::create($value);
       }
    }
}
