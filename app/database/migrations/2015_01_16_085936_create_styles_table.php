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
			$table->integer('components_id')->unsigned()->index();
			$table->string('pic_path',100)->unique();
			$table->integer('min_api')->default(14);
			$table->integer('price')->nullable();
			$table->string('title',100)->nullable();
			$table->text('descriptions')->nullable();
			$table->integer('use_times')->nullable()->default(0);
			$table->timestamps();
			$table->foreign('components_id')->references('id')->on('components')->onDelete('cascade');

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
