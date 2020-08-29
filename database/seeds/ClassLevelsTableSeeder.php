<?php

use Illuminate\Database\Seeder;
use App\Models\Setup\ClassLevel;

class ClassLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_levels')->truncate();
        $levels = [
        	[
	           'name' => 'Primary',
               'created_by' => 1,
            ],
            [
	           'name' => 'Junior Secondary',
               'created_by' => 1
            ],
            [
	           'name' => 'Secondary',
               'created_by' => 1
            ],
            [
	           'name' => 'Higher Secondary',
               'created_by' => 1
            ]
        ];

        foreach ($levels as $key=>$value){
        ClassLevel::create($value);
       }
    }
}
