<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('contract_id');
            $table->unsignedBigInteger('role_id');
            $table->decimal('fixed_monthly', 8, 2);
            $table->decimal('fixed_fee', 8, 2);
            $table->decimal('monthly_fee', 8, 2);
            $table->decimal('percentage_share', 8, 2);
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('contract_id')->references('id')->on('contracts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_details');
    }
}
