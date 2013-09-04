<?php

class PermissionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('permissions')->truncate();

		$permissions = array(
			array('name' => 'access_member', 'display_name' => 'Member Maintenance', 'description' => 'Permission to fully access Member Maintenance.', 'created_at' => new DateTime, 'updated_at' => new DateTime),
			array('name' => 'access_position', 'display_name' => 'Position Maintenance', 'desc	ription' => 'Permission to fully access Position Maintenance.', 'created_at' => new DateTime, 'updated_at' => new DateTime),
			array('name' => 'access_candidate', 'display_name' => 'Candidate Maintenance', 'description' => 'Permission to fully access Candidate Maintenance.', 'created_at' => new DateTime, 'updated_at' => new DateTime),
			array('name' => 'access_reports', 'display_name' => 'Access Reports', 'description' => 'Permission to fully access Reports.', 'created_at' => new DateTime, 'updated_at' => new DateTime),
			array('name' => 'access_election_start', 'display_name' => 'Start Election', 'description' => 'Privilege to START an election.', 'created_at' => new DateTime, 'updated_at' => new DateTime),
			array('name' => 'access_election_end', 'display_name' => 'End Election', 'description' => 'Privilege to END an election.', 'created_at' => new DateTime, 'updated_at' => new DateTime),
			array('name' => 'access_election_pause', 'display_name' => 'Pause Election', 'description' => 'Privilege to PAUSE an election.', 'created_at' => new DateTime, 'updated_at' => new DateTime),
			array('name' => 'access_election_status', 'display_name' => 'View Election Status', 'description' => 'Permission to View the Election Status.', 'created_at' => new DateTime, 'updated_at' => new DateTime),
			array('name' => 'access_election_generate_code', 'display_name' => 'Code Generation', 'description' => 'Permission to Generate Election Codes.', 'created_at' => new DateTime, 'updated_at' => new DateTime),
			array('name' => 'access_user', 'display_name' => 'User Accounts', 'description' => 'Permission to fully access User Accounts.', 'created_at' => new DateTime, 'updated_at' => new DateTime),
			array('name' => 'access_system_settings', 'display_name' => 'System Settings', 'description' => 'Permission to modify System Settings.', 'created_at' => new DateTime, 'updated_at' => new DateTime)
		);

		// Uncomment the below to run the seeder
		DB::table('permissions')->insert($permissions);
	}

}
