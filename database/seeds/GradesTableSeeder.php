<?php

use Illuminate\Database\Seeder;
use App\Models\Setup\Grade;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->truncate();
        $grades = [
        	[
	           'g_letter' => 'A+',
	           'g_mark' => '80-100',
	           'g_point' => '5',
               'created_by' => 1,
            ],
            [
	           'g_letter' => 'A',
	           'g_mark' => '70-79',
	           'g_point' => '4',
               'created_by' => 1
            ],
            [
	           'g_letter' => 'A-',
	           'g_mark' => '60-69',
	           'g_point' => '3.50',
               'created_by' => 1
            ],
            [
	           'g_letter' => 'B',
	           'g_mark' => '50-59',
	           'g_point' => '3',
               'created_by' => 1
            ],
            [
	           'g_letter' => 'C',
	           'g_mark' => '40-49',
	           'g_point' => '2',
               'created_by' => 1
            ],
            [
	           'g_letter' => 'D',
	           'g_mark' => '33-39',
	           'g_point' => '1',
               'created_by' => 1
            ],
            [
	           'g_letter' => 'F',
	           'g_mark' => '0-32',
	           'g_point' => '0',
               'created_by' => 1
            ]

        ];

        foreach ($grades as $key=>$value){
        Grade::create($value);
       }
    }
}
