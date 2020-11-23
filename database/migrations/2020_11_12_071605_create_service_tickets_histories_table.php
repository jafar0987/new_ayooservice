<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTicketsHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_tickets_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_ticket_id');
            $table->integer('status_from'); //PICKUP , DELIVERY , PAYMENT, QUOTATION DLL
            $table->integer('status_to'); //PICKUP , DELIVERY , PAYMENT, QUOTATION DLL
            $table->bigInteger('created_by')->nullable();
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
        Schema::dropIfExists('service_tickets_histories');
    }
}
