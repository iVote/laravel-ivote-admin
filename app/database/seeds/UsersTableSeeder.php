<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('users')->truncate();

		$users = array(
			array(  
						'username'             => 'administrator'
						, 'password'           => Hash::make( 'administrator' )
						, 'firstname'          => 'admin'
						, 'lastname'           => 'rator'
						, 'is_verified'        => TRUE 
						, 'created_at'         => new DateTime()
						, 'updated_at'         => new DateTime()
						, 'lookup_meta_values' => json_encode( 
																				array( 
																					array( 'lookup_id' => 5 , 'value' => 'ist' )
																				)
																			)
					),
			array( 
						'username'             => 'facilitator'
						, 'password'           => Hash::make( 'facilitator' )
						, 'firstname'          => 'faci'
						, 'lastname'           => 'tator'
						, 'is_verified'        => TRUE
						, 'created_at'         =>new DateTime()
						, 'updated_at'         =>new DateTime()
						, 'lookup_meta_values' => json_encode( 
																				array( 
																					array( 'lookup_id' => 5 , 'value' => 'li' )
																				)
																			)
					),
			array( 
						'username'             => 'generator'
						, 'password'           => Hash::make( 'generator' )
						, 'firstname'          => 'gen'
						, 'lastname'           => 'tor'
						, 'is_verified'        => FALSE 
						, 'created_at'         => new DateTime()
						, 'updated_at'         => new DateTime()
						, 'lookup_meta_values' => json_encode( 
																				array( 
																					array( 'lookup_id' => 5 , 'value' => 'Era' )
																				)
																			)
					)
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}
