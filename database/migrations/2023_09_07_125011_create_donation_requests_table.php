<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration
{

    public function up()
    {
        Schema::create('donation_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('age');
            $table->integer('blood_type_id')->unsigned();
            $table->integer('num_bags');
            $table->string('hospital');
            $table->string('address_hospital');
            $table->integer('city_id')->unsigned();
            $table->string('phone', 20);
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 10, 8);
            $table->text('notes')->nullable();
            $table->integer('client_id')->unsigned();
        });
    }

    public function down()
    {
        Schema::drop('donation_requests');
    }
}
