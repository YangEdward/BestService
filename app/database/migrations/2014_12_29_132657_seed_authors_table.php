<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedAuthorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('users')->insert(
			array(
				'area' => 'HuNan',
				'email' => 'murongyunlong@gmail.com',
				'tencent' => '279521655',
				'name' => 'YangEdward',
				'telphone' => '18603060684',
				'company'=> 'Bestride',
				'role'=>1,
				'password' => Hash::make('yt228645637')
			));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
