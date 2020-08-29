<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_exams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admission_offer_id')->unsigned();
            $table->foreign('admission_offer_id')->references('id')->on('admission_offers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->date('exam_date', 50);
            $table->time('exam_start_time', 50);
            $table->time('exam_end_time', 50);
            $table->timestamps();
            $table->integer('created_by');
            $table->integer('updated_by')->default(0);
            $table->tinyInteger('status')->default(1)->comment('1=active,2=inactive');
            $table->softDeletes();
        });

        // one to many relationship
        Schema::create('admission_exam_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admission_exam_id')->unsigned();
            $table->integer('admission_subject_id')->unsigned();

            $table->foreign('admission_exam_id')->references('id')->on('admission_exams')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('admission_subject_id')->references('id')->on('admission_subjects')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('subject_mark',10, 2);
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
        Schema::dropIfExists('admission_exams');
        Schema::dropIfExists('admission_exam_subjects');
    }
}
