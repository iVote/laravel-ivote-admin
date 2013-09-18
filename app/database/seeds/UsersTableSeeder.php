<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('users')->truncate();

		$users = array(
			array(  'username' => 'administrator'
						, 'password' => Hash::make( 'administrator' )
						, 'is_verified' => TRUE 
						, 'created_at' => new DateTime()
						, 'updated_at' => new DateTime()
						, 'lookup_meta_values' => json_encode( 
																				array( 
																						array('lookup_id' => 5, 'value' => 'admin')
																					, array( 'lookup_id' => 6 , 'value' => 'rator' )
																					, array( 'lookup_id' => 7 , 'value' => 'ist' )
																				)
																			)
					),
			array( 'username' => 'facilitator'
						, 'password' => Hash::make( 'facilitator' )
						, 'is_verified' => TRUE
						, 'created_at' =>new DateTime()
						, 'updated_at' =>new DateTime()
						, 'lookup_meta_values' => json_encode( 
																				array( 
																						array('lookup_id' => 5, 'value' => 'Faci')
																					, array( 'lookup_id' => 6 , 'value' => 'Tator' )
																					, array( 'lookup_id' => 7 , 'value' => 'Li' )
																				)
																			)
					),
			array( 'username' => 'generator'
						, 'password' => Hash::make( 'generator' )
						, 'is_verified' => FALSE 
						, 'created_at' => new DateTime()
						, 'updated_at' => new DateTime()
						, 'lookup_meta_values' => json_encode( 
																				array( 
																						array('lookup_id' => 5, 'value' => 'Gen')
																					, array( 'lookup_id' => 6 , 'value' => 'tor' )
																					, array( 'lookup_id' => 7 , 'value' => 'Era' )
																				)
																			)
					)
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}
