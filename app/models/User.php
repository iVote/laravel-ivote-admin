<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends Ardent implements UserInterface, RemindableInterface, Presentable {

	use HasRole; // Entrust

	protected $softDelete = TRUE;

	// Ardent - Auto Hydration
	public $autoHydrateEntityFromInput    = TRUE;

	public $forceEntityHydrationFromInput = TRUE;

	// Ardent - Auto hash
	public static $passwordAttributes  = array('password');

	// Ardent - Relational Entities
  public static $relationsData = array(
		'roles' => array( self::BELONGS_TO_MANY, 'Role', 'table' => 'assigned_role' )
  );

  // Ardent - Validation Rules
	public static $rules = array(
		'firstname' => array('required','regex:^[A-z][-\'a-zA-Z]+$^'),
		'lastname'  => array('required','regex:^[A-z][-\'a-zA-Z]+$^'),
		'username'  => array('required','regex:^[A-z][a-z0-9]+$^', 'between:8,16', 'unique:users'),		
		'role'      => 'integer'
	);

	// Ardent - Custom Validation Messages
	public static $customMessages = array(

	);

	// Laravel - Fillable Attributes
	protected $fillable = array( 'username', 'lookup_meta_values', 'firstname', 'lastname' );


	// Function for newly registered admin accounts
	public function addUpdateAccount( $isUpdate = FALSE )
	{		
		$role = Role::findOrFail( (int) Input::get( 'role' ) );
		
		$this->lookup_meta_values = Input::all();

		if ( $isUpdate ) {
			// Although this looks redundant, but its a common bug 
			// for laravel not to update a model with a 'unique' rule
			$this::$rules = array_merge( self::$rules, array( 'username' => "unique:users,username,{$this->id}" ));
		}

		else {
			// Set temporary password for new accounts
			$this->password = str_random( 6 ); 
		}

		if ( ! $this->save() ) {
			return FALSE;
		}

		// Detach all roles first to make sure
		$this->roles()->detach();

		// Entrust - attaching a role to user.
		$this->attachRole( $role );

		return TRUE;

	}

	public function updateProfile()
	{
		$role = Role::findOrFail( (int) Input::get( 'role' ) );

		$this->lookup_meta_values = Input::all();

		$this::$rules = array_merge(self::$rules, array( 'username' => "unique:users,username,{$this->id}" ));

		if ( ! $this->save() ) {
			return FALSE;
		}

		// Entrust - attaching a role to user.
		$this->roles()->detach();

		// Attach Role
		$this->attachRole( $role );

		return TRUE;
	}


	public function getMetaValue( $lookup_id )
	{

		$metaValues = json_decode( $this->lookup_meta_values )->metas;

		foreach ( $metaValues as $meta ) {

			if ( $meta->lookup_id == $lookup_id ) {
				return $meta->value;
			}

		}

		return; 
	}



	// Laravel Mutator = http://four.laravel.com/docs/eloquent#accessors-and-mutators
	public function setLookupMetaValuesAttribute( $value )
	{

		$metas      = array( 'metas' => array(), 'security' => array() );
		$adminMetas = Lookup::getAdminMetas();

		if ( ! $adminMetas->isEmpty() ) {
			
			foreach ( $adminMetas as $meta ) :

				$metas['metas'][] = array( 

					'lookup_id' => $meta->id, 
					'value'     => !array_key_exists('lookup_id_' . $meta->id, $value ) ? '' : strtolower( $value[ 'lookup_id_' . $meta->id ] ) // Transformed to lower case to prevent problem

				);
			
			endforeach;

		}

		$this->attributes[ 'lookup_meta_values' ] = json_encode( $metas );

	}

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}


  // Presenter - Initializer
  public function getPresenter()
  {
  	return new UserAccountPresenter($this);
  }

}