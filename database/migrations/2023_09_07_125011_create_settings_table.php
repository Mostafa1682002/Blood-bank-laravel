<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration
{

    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone', 20);
            $table->string('email');
            $table->string('f_link');
            $table->string('i_link');
            $table->string('t_link');
            $table->string('y_link');
            $table->string('w_link');
            $table->text('about_app');
            $table->text('notification_setting_text');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('settings');
    }
}
