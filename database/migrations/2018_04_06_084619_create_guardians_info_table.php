<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardiansInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('source_id')->unsigned();
            $table->tinyInteger('source_type')->comment('1=student, 2= teacher');
            $table->string('father_name',50);
            $table->string('father_phone',11)->nullable();
            $table->string('father_national_id',20)->nullable();
            $table->integer('father_profession');
            $table->string('mother_name',50);
            $table->string('mother_phone',11)->nullable();
            $table->string('mother_national_id',20)->nullable();
            $table->integer('mother_profession');
            $table->string('guardian_name',50)->nullable();
            $table->string('guardian_phone',11)->nullable();
            $table->string('guardian_national_id',20)->nullable();
            $table->integer('guardian_profession')->default(0)->nullable();
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
        Schema::dropIfExists('guardians_info');
    }
}
