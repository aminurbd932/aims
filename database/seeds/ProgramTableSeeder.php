<?php

use Illuminate\Database\Seeder;
use App\Models\Setup\Program;

class ProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->truncate();
        $programs = [
        	[
	           'name' => 'Six',
	           'class_level_id' => 2,
               'created_by' => 1,
            ],
            [
	           'name' => 'Seven',
	           'class_level_id' => 2,
               'created_by' => 1
            ],
            [
	           'name' => 'Eight',
	           'class_level_id' => 2,
               'created_by' => 1
            ],
            [
	           'name' => 'Nine',
	           'class_level_id' => 2,
               'created_by' => 1
            ],
            [
	           'name' => 'Ten',
	           'class_level_id' => 2,
               'created_by' => 1
            ]
        ];

        foreach ($programs as $key=>$value){
        Program::create($value);
       }
    }
}
