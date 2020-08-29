<?php

use Illuminate\Database\Seeder;
use App\Models\Setup\Shift;

class ShiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shifts')->truncate();
        $shifts = [
        	[
	           'name' => 'Morning',
	           'start_time' => '08:00:00',
	           'end_time' => '11:30:00',
               'created_by' => 1,
            ],
            [
	           'name' => 'Day',
	           'start_time' => '11:30:00',
	           'end_time' => '17:00:00',
               'created_by' => 1
            ],
            [
	           'name' => 'Night',
	           'start_time' => '17:00:00',
	           'end_time' => '23:00:00',
               'created_by' => 1
            ]
        ];

        foreach ($shifts as $key=>$value){
        Shift::create($value);
       }
    }
}
