<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 8, 2);
            $table->year('year');
            $table->tinyInteger('month');
            $table->unsignedBigInteger('contract_detail_id');
            /*$table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('film_id');
            $table->unsignedBigInteger('payment_type_id');
            $table->unsignedBigInteger('role_id');*/
            $table->timestamps();
            $table->foreign('contract_detail_id')->references('id')->on('contract_details');
            /*$table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('film_id')->references('id')->on('films');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('payment_type_id')->references('id')->on('payment_types');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
