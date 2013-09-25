<?php

use LaravelBook\Ardent\Ardent;


class Group extends Ardent implements Presentable
{
	
	// Ardent - Auto Hydration
	public $autoHydrateEntityFromInput    = true;
	public $forceEntityHydrationFromInput = true;

	// Ardent - Relational Entities
	public static $relationsData = array(
		'positions' => array(self::BELONGS_TO_MANY, 'Position', 'table' => 'positions_groups')
	);

  // Ardent - Validation Rules
	public static $rules = array(
		'name' => array('required', 'unique:groups')
	);

	// Ardent - Custom Validation Messages
	public static $customMessages = array(
		//'regex' => 'Name pattern should start with a letter and only allow letters, numbers, space, dash and quote.' 
	);

	// Laravel - Fillable Attributes
	protected $fillable = array('name', 'short_description');




	#============= Start of Methods ================#


	// Function for newly registered admin accounts
	public function commit( $isUpdate = FALSE )
	{		
		if ( $isUpdate ) {
			// Although this looks redundant, but its a common bug 
			// for laravel not to update a model with a 'unique' rule
			$this::$rules = array_merge( self::$rules, array( 'name' => "unique:groups,name,{$this->id}" ));
		}

		if ( ! $this->save() ) {
			return FALSE;
		}

		// Entrust - attaching position/s to group.
		$this->positions()->sync( is_array( Input::get( 'positions' ) ) ? Input::get( 'positions' ) : array() );

		return TRUE;

	}

	// Mutator
	public function setNameAttribute($value)
	{
		$this->attributes['name'] = ucwords(strtolower($value));
	}

	// Presenter - Initializer
	public function getPresenter()
	{
		return new GroupPresenter($this);
	}

}