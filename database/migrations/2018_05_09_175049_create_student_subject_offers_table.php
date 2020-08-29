<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentSubjectOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_subject_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_promotion_id')->unsigned();
            $table->foreign('student_promotion_id')->references('id')->on('student_promotions');
            $table->integer('subject_offer_id')->unsigned();
            $table->foreign('subject_offer_id')->references('id')->on('subject_offers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('subject_type', 2)->default(0);
            $table->timestamps();
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
        Schema::dropIfExists('student_subject_offers');
    }
}
