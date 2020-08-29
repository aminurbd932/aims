<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributeMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribute_marks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_offer_id')->unsigned();
            $table->foreign('subject_offer_id')->references('id')->on('subject_offers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('mark_type_id')->unsigned();
            $table->foreign('mark_type_id')->references('id')->on('mark_types')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('orginal_mark', 10, 2);
            $table->decimal('percent_mark', 10, 2);
            $table->decimal('divided_mark', 10, 2);
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
        Schema::dropIfExists('distribute_marks');
    }
}
