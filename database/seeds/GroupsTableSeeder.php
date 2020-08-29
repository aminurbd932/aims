<?php

use Illuminate\Database\Seeder;
use App\Models\Setup\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->truncate();
        $groups = [
        	[
	           'name' => 'General',
               'created_by' => 1,
            ],
            [
	           'name' => 'Science',
               'created_by' => 1
            ],
            [
	           'name' => 'Buiesness Studies',
               'created_by' => 1
            ],
            [
	           'name' => 'Humanitis',
               'created_by' => 1
            ]
        ];

        foreach ($groups as $key=>$value){
        Group::create($value);
       }
    }
}
