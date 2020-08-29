<?php

use Illuminate\Database\Seeder;
use App\Models\Setup\Medium;

class MediumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mediums')->truncate();
        $mediums = [
        	[
	           'name' => 'Bangla',
               'created_by' => 1,
            ],
            [
	           'name' => 'English',
               'created_by' => 1
            ]
        ];

        foreach ($mediums as $key=>$value){
        Medium::create($value);
       }
    }
}
