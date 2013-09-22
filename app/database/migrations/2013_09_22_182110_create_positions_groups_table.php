<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('positions_groups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('position_id')->unsigned();
      $table->integer('group_id')->unsigned();
      $table->foreign('position_id')->references('id')->on('positions'); // assumes a users table
      $table->foreign('group_id')->references('id')->on('groups');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('positions_groups');
	}

}
