<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_tasks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_ticket_id');
            $table->bigInteger('user_id');
            $table->dateTime('date_start');
            $table->integer('date_est'); // MINUTE
            $table->dateTime('date_end');
            $table->text('notes');
            $table->integer('type'); // Repaired, PICKUP ,ADMIN
            $table->text('repair_details')->nullable();
            $table->text('check_up_result')->nullable();
            $table->integer('damage_level')->nullable();
            $table->integer('rating')->nullable();
            $table->integer('action')->nullable();
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
        Schema::dropIfExists('service_tasks');
    }
}
