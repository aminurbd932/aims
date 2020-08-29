<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mobile', 50)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('address', 255)->nullable();
            $table->decimal('balance', 10, 2)->default(0)->nullable();
            $table->timestamps();
            $table->integer('created_by');
            $table->integer('updated_by')->default(0);
            $table->tinyInteger('status')->default(1)->comment('1=active,2=inactive');
            //$table->tinyInteger('is_deleted')->default(0)->comment('1=deleted,0=no deleted');
            $table->softDeletes();
        });

        // one to many relationship
        Schema::create('supplier_companies', function (Blueprint $table) {
            $table->integer('supplier_id')->unsigned();
            $table->integer('company_id')->unsigned();

            $table->foreign('company_id')->references('id')->on('company')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')
                ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['supplier_id', 'company_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('supplier_companies');
    }
}
