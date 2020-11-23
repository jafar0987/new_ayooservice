<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_claims', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_ticket_id');
            $table->string('external_ticket');
            $table->string('name_company');
            $table->string('address_company');
            $table->string('name_company_pic');
            $table->string('phone');
            $table->integer('status'); // Open or Closed
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
        Schema::dropIfExists('vendor_claims');
    }
}
