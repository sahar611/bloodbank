<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('image');
			$table->text('body');
			$table->integer('category_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}