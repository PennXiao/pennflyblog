<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNavigationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('navigation', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 45)->unique('name_UNIQUE')->comment('导航中文名称');
			$table->string('textarea')->comment('文章概要详情');
			$table->string('actionurl', 45)->unique('url_UNIQUE')->comment('url路径');
			$table->boolean('sequence')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('navigation');
	}

}
