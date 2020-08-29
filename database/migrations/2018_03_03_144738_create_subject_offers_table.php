<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('program_offer_id')->unsigned();
            $table->foreign('program_offer_id')->references('id')->on('program_offers')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        // one to many relationship
        Schema::create('subject_program_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_offer_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->foreign('subject_offer_id')->references('id')->on('subject_offers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('subject_mark',10, 2);
            $table->timestamps();
            $table->integer('created_by');
            $table->integer('updated_by')->default(0);
            $table->tinyInteger('status')->default(1)->comment('1=active,2=inactive');
            $table->softDeletes();
            //$table->primary(['admission_exam_id', 'admission_subject_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_offers');
    }
}
