<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		Model::unguard();
        $this->call(UsersTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(ConfigTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(ClassLevelsTableSeeder::class);
        $this->call(ProgramTableSeeder::class);
        $this->call(MediumsTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(ShiftsTableSeeder::class);
        $this->call(GradesTableSeeder::class);
        $this->call(MarkTypesTableSeeder::class);
        $this->call(BoardTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
