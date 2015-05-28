<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
      		$table->increments('id');
            $table->string('first_name',128)->nullable();
            $table->string('last_name',128)->nullable();
            $table->string('email',128)->nullable();
            $table->string('password',128)->nullable();
            $table->string('facebook_id',256)->nullable();
            $table->integer('role_id')->nullable();
            $table->string('remember_token',256)->nullable();
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
		Schema::drop('users');
	}

}
