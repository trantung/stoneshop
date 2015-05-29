<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')
			      ->references('id')->on('categories')
			      ->onDelete('cascade');
			$table->string('name',128);
			$table->double('price');
			$table->string('image_url',256);
			$table->string('description',256);
			$table->integer('total_rate');
			$table->integer('quantity_rate');
			$table->integer('average_rate');
			$table->softDeletes(); // <-- This will add a deleted_at field
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
		Schema::drop('products');
	}

}
