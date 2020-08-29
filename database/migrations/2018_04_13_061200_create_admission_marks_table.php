<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_subject_marks_mst', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id')->unsigned();
            $table->foreign('applicant_id')->references('id')->on('applicants')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('admission_offer_id')->unsigned();
            $table->foreign('admission_offer_id')->references('id')->on('admission_offers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->integer('created_by');
            $table->integer('updated_by')->default(0);
            $table->tinyInteger('status')->default(1)->comment('1=active,2=inactive');
            $table->softDeletes();
        });

         // one to many relationship
        Schema::create('admission_subject_marks_dtls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admission_subject_mark_id')->unsigned();
            $table->integer('admission_subject_id')->unsigned();

            $table->foreign('admission_subject_mark_id')->references('id')->on('admission_subject_marks_mst')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('admission_subject_id')->references('id')->on('admission_subjects')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('result_mark',10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admission_subject_marks_mst');
        Schema::dropIfExists('admission_subject_marks_dtls');
    }
}
