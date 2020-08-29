<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('teacher_code',25)->unique();
            $table->string('full_name',50);
            $table->integer('employee_type')->default(0)->nullable()->comment('1=Faculty Member,2=Admin, 3=Third Grade Staff, 4=Fourth Grade Staff');
            $table->integer('employment_status')->default(0)->nullable()->comment('1=Permanent,2=Part-time, 3=Temporary');
            $table->integer('designation_id')->default(0)->nullable();
            $table->integer('department_id')->default(0)->nullable();
            $table->date('joining_date', 30);
            $table->date('dob', 30);
            $table->integer('position');
            $table->integer('blood_group_id')->default(0)->nullable();
            $table->integer('religion_id');
            $table->string('national_id_no', 20)->nullable();
            $table->string('birth_reg_no', 20);
            $table->string('phone', 20)->nullable();
            $table->string('email', 20)->nullable();
            $table->tinyInteger('sex')->comment('1=male,2=female, 3=others');
            $table->timestamps();
            $table->integer('created_by');
            $table->integer('updated_by')->default(0);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
