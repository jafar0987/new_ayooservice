<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_tickets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->tinyInteger('ticket_type');
            $table->string('ticket_number');
            $table->bigInteger('service_tickets_parent');
            $table->integer('status');
            $table->bigInteger('branch_id');
            $table->bigInteger('package_id')->nullable();
            $table->bigInteger('brand_id')->nullable();
            $table->bigInteger('product_type_id')->nullable();
            $table->bigInteger('user_address_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_number')->nullable();
            $table->string('product_serial_number')->nullable();
            $table->text('product_description')->nullable();
            $table->text('product_photo')->nullable();
            $table->text('product_accessories')->nullable();
            $table->tinyInteger('warranty_status')->nullable();
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
        Schema::dropIfExists('service_tickets');
    }
}
