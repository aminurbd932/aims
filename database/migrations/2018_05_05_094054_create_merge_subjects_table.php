<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMergeSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merge_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('subject_offer_id')->unsigned();
            $table->foreign('subject_offer_id')->references('id')->on('subject_offers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('merge_group')->default(0);
            $table->tinyInteger('status')->default(1)->comment('1=active,2=inactive');
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
        Schema::dropIfExists('merge_subjects');
    }
}
