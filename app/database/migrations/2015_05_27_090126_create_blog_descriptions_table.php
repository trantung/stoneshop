<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogDescriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blog_descriptions', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('blog_id')->unsigned();
			$table->foreign('blog_id')
			      ->references('id')->on('blogs')
			      ->onDelete('cascade');
			$table->text('description');
			$table->text('image_url')->nullable();
			$table->softDeletes();
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
		Schema::drop('blog_descriptions');
	}

}
