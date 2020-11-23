<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_quotations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_ticket_id');
            $table->string('ticket_number_quotation');
            $table->text('unit_inspection_results');
            $table->date('due_date_invoice');
            $table->integer('sub_total');
            $table->integer('tax');
            $table->integer('total');
            $table->integer('status'); //PAID OR UNPAID OR Partial
            $table->integer('approved')->nullable(); // True False Or Null
            $table->date('approved_date')->nullable();
            $table->bigInteger('created_by');
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
        Schema::dropIfExists('service_quotations');
    }
}
