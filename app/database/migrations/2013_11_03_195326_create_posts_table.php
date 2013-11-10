<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('title');
            $table->longtext('rawContent');
            $table->longtext('content');
            $table->text('excerpt');
            $table->string('status')->default('draft');
            $table->string('slug')->unique()->index();

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
		Schema::drop('posts');
	}

}
