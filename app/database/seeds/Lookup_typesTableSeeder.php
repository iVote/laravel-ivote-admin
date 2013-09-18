<?php

class Lookup_typesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('lookup_types')->truncate();

		$lookup_types = array(
			array( 'type' => 'Members Meta', 'description' => 'Lookups for Members table\'s meta fields' ),
			array( 'type' => 'Administrators Meta', 'description' => 'Lookups for Users table\'s meta fields' ),
			array( 'type' => 'Candidates Meta', 'description' => 'Lookups for Candidates table\'s meta fields' ),
			array( 'type' => 'Security Questions', 'description' => 'List of Security Questions' ),
			array( 'type' => 'Settings', 'description' => 'List of Security Questions' )
		);

		// Uncomment the below to run the seeder
		DB::table('lookup_types')->insert($lookup_types);
	}

}
