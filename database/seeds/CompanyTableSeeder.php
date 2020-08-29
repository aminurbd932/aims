<?php

use Illuminate\Database\Seeder;
use App\Models\Setup\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company')->truncate();
        $company = [
	           'name' => 'None',
	           'type' => 1,
	           'created_by' => 1
        ];
        
        Company::create($company);
    }
}
