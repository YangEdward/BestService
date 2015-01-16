<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStylesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('styles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->foreign('components_id')->references('id')->on('components');
			$table->char('pic_path',100)->unique();
			$table->integer('min_api')->default(14);
			$table->integer('price')->nullable();
			$table->char('title',100)->nullable();
			$table->text('descriptions')->nullable();
			$table->integer('use_times')->nullable()->default(0);
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
		Schema::drop('styles');
	}

}
