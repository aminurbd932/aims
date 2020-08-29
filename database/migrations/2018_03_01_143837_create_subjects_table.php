<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('class_level_id')->unsigned();
            $table->foreign('class_level_id')->references('id')->on('class_levels')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('code');
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
        Schema::dropIfExists('subjects');
    }
}
