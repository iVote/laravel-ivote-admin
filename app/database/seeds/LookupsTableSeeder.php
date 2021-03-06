<?php

class LookupsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('lookups')->truncate();

		$lookups = array(

			// Members Meta
			array(  'lookup_type_id' => 1 , 'value' => 'birthday', 'is_nullable' => FALSE,  'created_at' => new DateTime(), 'updated_at' => new DateTime() ),

			// Administrators Meta
			array(  'lookup_type_id' => 2, 'value' => 'middle name',  'is_nullable' => TRUE, 'created_at' => new DateTime(), 'updated_at' => new DateTime() ),
			array(  'lookup_type_id' => 2, 'value' => 'email address',  'is_nullable' => FALSE, 'created_at' => new DateTime(), 'updated_at' => new DateTime() ),
			
			//Candidates Meta
			// array(  'lookup_type_id' => 3, 'value' => '', 'is_nullable' => TRUE,  'created_at' => new DateTime(), 'updated_at' => new DateTime() ),
			
			//Security Questions
			array(  'lookup_type_id' => 4, 'value' => 'What\'s your mother\'s maiden name?', 'is_nullable' => FALSE, 'created_at' => new DateTime(), 'updated_at' => new DateTime() ),
			array(  'lookup_type_id' => 4, 'value' => 'Where is the street you grew up with', 'is_nullable' => FALSE, 'created_at' => new DateTime(), 'updated_at' => new DateTime() ),
			array(  'lookup_type_id' => 4, 'value' => 'What\'s your favorite food', 'is_nullable' => FALSE, 'created_at' => new DateTime(), 'updated_at' => new DateTime() ),
			array(  'lookup_type_id' => 4, 'value' => 'What\'s the name of your pet', 'is_nullable' => FALSE, 'created_at' => new DateTime(), 'updated_at' => new DateTime() )
			
			//Settings
			// array(  'lookup_type_id' => 5, 'value' => '', 'description' => '', 'is_nullable' => TRUE,  'created_at' = new DateTime(), 'updated_at' => new DateTime() ),
		);

		// Uncomment the below to run the seeder
		DB::table('lookups')->insert($lookups);
	}

}
