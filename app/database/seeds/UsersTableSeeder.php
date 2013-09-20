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
						, 'firstname'          => 'super'
						, 'lastname'           => 'user'
						, 'is_verified'        => TRUE 
						, 'created_at'         => new DateTime()
						, 'updated_at'         => new DateTime()
						, 'lookup_meta_values' => json_encode( array( 'metas' => array( array( 'lookup_id' => 2 , 'value' => 'ist' ) ), 'security' => array( 'lookup_id' => 4, 'value' => 'ist' ) ) )
					),
			array( 
						'username'             => 'facilitator'
						, 'password'           => Hash::make( 'facilitator' )
						, 'firstname'          => 'faci'
						, 'lastname'           => 'tator'
						, 'is_verified'        => TRUE
						, 'created_at'         =>new DateTime()
						, 'updated_at'         =>new DateTime()
						, 'lookup_meta_values' => json_encode( array( 'metas' => array( array( 'lookup_id' => 2 , 'value' => 'Chowchow' ) ), 'security' => array( 'lookup_id' => 7, 'value' => 'li' ) ) )
					),
			array( 
						'username'             => 'generator'
						, 'password'           => str_random(6)
						, 'firstname'          => 'gen'
						, 'lastname'           => 'tor'
						, 'is_verified'        => FALSE 
						, 'created_at'         => new DateTime()
						, 'updated_at'         => new DateTime()
						, 'lookup_meta_values' => json_encode( array( 'metas' => array( array( 'lookup_id' => 2 , 'value' => 'Era' ) ), 'security' => array() ) )
					)
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}
