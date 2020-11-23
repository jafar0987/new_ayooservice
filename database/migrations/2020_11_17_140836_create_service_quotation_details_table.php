<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceQuotationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_quotation_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_quotation_id');
            $table->text('name');
            $table->text('stock_condition')->nullable();
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->integer('total');
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
        Schema::dropIfExists('service_quotation_details');
    }
}
