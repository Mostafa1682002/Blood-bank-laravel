<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticalesTable extends Migration {

	public function up()
	{
		Schema::create('articales', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('image');
			$table->text('content');
			$table->integer('category_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('articales');
	}
}