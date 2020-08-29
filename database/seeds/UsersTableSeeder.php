<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $users = [
        	[
	           'name' => 'Aminur Rahman',
	           'email' => 'superadmin@gmail.com',
	           'password' => bcrypt('123456'),
               'created_at' => date('Y-m-d'),
               'created_by' => 1,
            ],
            [
	           'name' => 'Shah Alam',
	           'email' => 'supereditor@gmail.com',
	           'password' => bcrypt('123456'),
               'created_at' => date('Y-m-d'),
               'created_by' => 1
            ]
        ];

        foreach ($users as $key=>$value){
        User::create($value);
       }
    }
}
