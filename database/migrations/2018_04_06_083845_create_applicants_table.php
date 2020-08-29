<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admission_offer_id')->unsigned();
            $table->foreign('admission_offer_id')->references('id')->on('admission_offers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('applicant_code',25)->unique();
            $table->string('full_name',50);
            $table->date('dob', 30);
            $table->integer('blood_group_id')->default(0)->nullable();
            $table->integer('religion_id');
            $table->string('national_id_no', 20)->nullable();
            $table->string('birth_reg_no', 20);
            $table->string('phone', 20)->nullable();
            $table->string('email', 20)->nullable();
            $table->tinyInteger('sex')->comment('1=male,2=female, 3=others');
            $table->tinyInteger('assign_status')->default(0)->comment('1=allow,2=waiting,3=not allow');
            $table->tinyInteger('is_student')->default(0)->comment('1=yes,0=no');
            $table->integer('serial')->default(0)->nullable();
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
        Schema::dropIfExists('applicants');
    }
}
