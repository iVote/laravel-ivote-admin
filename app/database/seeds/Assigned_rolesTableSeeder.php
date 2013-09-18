<?php

class Assigned_rolesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('assigned_roles')->truncate();

		$assigned_roles = array(
			array( 'user_id' => 1, 'role_id' => 1),
			array( 'user_id' => 2, 'role_id' => 2),
			array( 'user_id' => 3, 'role_id' => 3),
		);

		// Uncomment the below to run the seeder
		DB::table('assigned_roles')->insert($assigned_roles);
	}

}
