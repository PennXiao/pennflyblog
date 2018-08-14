<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagcloudTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tagcloud', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 45)->unique('name_UNIQUE')->comment('标签名称');
			$table->boolean('hot')->comment('热度');
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
		Schema::drop('tagcloud');
	}

}
