<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('username');
            $table->boolean('gender')->default(0);
            $table->bigInteger('province_id');
            $table->bigInteger('city_id');
            $table->text('photo')->nullable();
            $table->text('name_pic')->nullable();
            $table->text('phone_number_pic')->nullable();
            $table->text('email_pic')->nullable();
            $table->string('nip')->nullable();
            $table->string('agency')->nullable();
            $table->string('work_unit')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
