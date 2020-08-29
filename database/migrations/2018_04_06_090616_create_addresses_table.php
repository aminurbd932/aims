<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('source_id')->unsigned();
            $table->tinyInteger('source_type')->comment('1=student, 2=teacher');
            $table->string('present_address',50)->nullable();
            $table->integer('present_thana_id')->unsigned();
            $table->string('present_post_code', 20);
            $table->string('permanent_address',50)->nullable();
            $table->integer('permanent_thana_id')->default(0)->nullable();
            $table->string('permanent_post_code', 20)->nullable();
            $table->timestamps();
        });

        // Schema::table('addresses', function($table){
        //     $table->foreign('present_thana_id')->references('id')->on('thanas')
        //         ->onUpdate('cascade')->onDelete('cascade');
        //     $table->foreign('permanent_thana_id')->references('id')->on('thanas')
        //        ->onUpdate('cascade')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
