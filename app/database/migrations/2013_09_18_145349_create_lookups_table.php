<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLookupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lookups', function(Blueprint $table) {
			$table->increments( 'id' );
			$table->integer( 'lookup_types_id' )->unsigned();
			$table->string( 'value' );
			$table->string( 'description' )->nullable();
			$table->boolean( 'is_nullable' )->default( TRUE );
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
		Schema::drop('lookups');
	}

}
