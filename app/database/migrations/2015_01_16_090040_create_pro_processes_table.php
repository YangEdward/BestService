<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProProcessesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pro_processes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('users_id')->unsigned()->index();
			$table->integer('customer_projects_id')->unsigned()->index();
			$table->integer('last_id')->unsigned()->nullable();
			$table->timestamp('finish_time')->nullable();
			$table->integer('status')->nullable();
			$table->string('handle_person');
			$table->text('back_reason')->nullable();
			$table->text('answer')->nullable();
			$table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('customer_projects_id')->references('id')->on('customer_projects')->onDelete('cascade');
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
		Schema::drop('pro_processes');
	}

}
