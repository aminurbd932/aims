<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->unique();
            $table->integer('session_id')->unsigned();
            $table->foreign('session_id')->references('id')->on('sessions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('class_level_id')->unsigned();
            $table->foreign('class_level_id')->references('id')->on('class_levels')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('program_id')->unsigned();
            $table->foreign('program_id')->references('id')->on('programs')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('groups')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('medium_id')->unsigned();
            $table->foreign('medium_id')->references('id')->on('mediums')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('shift_id')->unsigned();
            $table->foreign('shift_id')->references('id')->on('shifts')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('seat_number');
            $table->tinyInteger('is_exam')->default(0)->comment('1=yes,0=no');
            $table->timestamps();
            $table->integer('created_by');
            $table->integer('updated_by')->default(0);
            $table->tinyInteger('status')->default(1)->comment('1=active,2=inactive');
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
        Schema::dropIfExists('admission_offers');
    }
}
