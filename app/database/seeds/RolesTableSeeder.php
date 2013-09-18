<?php

class RolesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('roles')->truncate();
		// DB::table('permission_role')->truncate();

		$roles = array(
			array('name' => 'Administrator', 'description' => 'Can do all things.', 'created_at' => new DateTime, 'updated_at' => new DateTime),
			array('name' => 'Facilitator', 'description' => 'Can do some things.', 'created_at' => new DateTime, 'updated_at' => new DateTime),
			array('name' => 'Generator', 'description' => 'Ability to generate election codes.', 'created_at' => new DateTime, 'updated_at' => new DateTime),
			array('name' => 'Reports Master', 'description' => 'Reporting Capabilities', 'created_at' => new DateTime, 'updated_at' => new DateTime)
		);

		$permission_role = array(
			/* Administrator Permissions */
			array('permission_id' => 1, 'role_id' => 1),
			array('permission_id' => 2, 'role_id' => 1),
			array('permission_id' => 3, 'role_id' => 1),
			array('permission_id' => 4, 'role_id' => 1),
			array('permission_id' => 5, 'role_id' => 1),
			array('permission_id' => 6, 'role_id' => 1),
			array('permission_id' => 7, 'role_id' => 1),
			array('permission_id' => 8, 'role_id' => 1),
			array('permission_id' => 9, 'role_id' => 1),
			array('permission_id' => 10, 'role_id' => 1),
			array('permission_id' => 11, 'role_id' => 1),

			/* Facilitator Permissions */
			array('permission_id' => 1, 'role_id' => 2),
			array('permission_id' => 2, 'role_id' => 2),
			array('permission_id' => 3, 'role_id' => 2),
			array('permission_id' => 4, 'role_id' => 2),
			array('permission_id' => 8, 'role_id' => 2),
			array('permission_id' => 9, 'role_id' => 2),

			/* Generator Permissions */
			array('permission_id' => 9, 'role_id' => 3),

			/* Reports Master Permissions */
			array('permission_id' => 4, 'role_id' => 4),
		);

		// Uncomment the below to run the seeder
		DB::table('roles')->insert($roles);
		DB::table('permission_role')->insert($permission_role);
	}

}
