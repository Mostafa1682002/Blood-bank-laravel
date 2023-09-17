<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration
{

    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('name');
            $table->string('phone', 50);
            $table->string('password');
            $table->boolean('active')->default(1);
            $table->date('date_birth');
            $table->integer('blood_type_id')->unsigned();
            $table->date('last_date_donation');
            $table->integer('city_id')->unsigned();
            $table->string('pin_code')->nullable();
            $table->timestamps();
            $table->string('api_token')->nullable();
        });
    }

    public function down()
    {
        Schema::drop('clients');
    }
}
