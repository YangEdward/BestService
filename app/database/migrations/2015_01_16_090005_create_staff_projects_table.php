<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaffProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staff_projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('users_id')->unsigned()->index();
			$table->integer('belongs_to_id')->unsigned()->index();
			$table->integer('handle_times');
			$table->timestamps('finish_time')->nullable();
			$table->string('creator')->nullable();
			$table->integer('is_back')->nullable();
			$table->timestamps();
			$table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('belongs_to_id')->references('id')->on('customer_projects')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('staff_projects');
	}

}
