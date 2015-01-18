<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title',100);
			$table->string('belong',36);
			$table->text('brief')->nullable();
			$table->string('user_name',36);
			$table->string('password',100)->nullable();
			$table->string('email',100);
			$table->string('phone',20);
			$table->integer('price')->nullable();
			$table->timestamp('price_time')->nullable();
			$table->timestamp('finished_times')->nullable();
			$table->string('file_path',100)->unique();
			$table->integer('back_times')->nullable();
			$table->integer('status')->nullable();
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
		Schema::drop('customer_projects');
	}

}
