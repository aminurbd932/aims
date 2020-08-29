<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('source_id')->unsigned();
            $table->tinyInteger('source_type')->comment('1=student,2=teacher');
            $table->integer('exam_id')->default(0);
            $table->string('roll_no',50)->nullable();
            $table->string('reg_no',50)->nullable();
            $table->integer('board_id')->default(0);
            //$table->foreign('board_id')->references('id')->on('boards')
               // ->onUpdate('cascade')->onDelete('cascade');
            $table->string('gpa',10)->nullable();
            $table->decimal('total_mark', 10, 2)->default(0)->nullable();
            $table->string('passing_year',10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qualifications');
    }
}
