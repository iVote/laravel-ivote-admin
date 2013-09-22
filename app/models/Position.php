<?php

use LaravelBook\Ardent\Ardent;


class Position extends Ardent implements Presentable
{
	// Ardent - Auto Hydration
	public $autoHydrateEntityFromInput    = true;
	public $forceEntityHydrationFromInput = true;

	// Ardent - Relational Entities
  public static $relationsData = array(
		'permissions' => array(self::BELONGS_TO_MANY, 'Group', 'table' => 'positions_groups')
  );

  // Ardent - Validation Rules
	public static $rules = array(
		'title' => array('required', 'unique:positions'),
		'limit' => array('required', 'integer', 'min:1')
	);

	// Ardent - Custom Validation Messages
	public static $customMessages = array(
		//'regex' => 'Name pattern should start with a letter and only allow letters, numbers, space, dash and quote.' 
	);

	// Laravel - Fillable Attributes
	protected $fillable = array('title', 'short_description', 'limit', 'is_group_dependent');

	// Function for newly registered admin accounts
	public function commit( $isUpdate = FALSE )
	{		
		if ( $isUpdate ) {
			// Although this looks redundant, but its a common bug 
			// for laravel not to update a model with a 'unique' rule
			$this::$rules = array_merge( self::$rules, array( 'title' => "unique:positions,title,{$this->id}" ));
		}

		if ( ! $this->save() ) {
			return FALSE;
		}

		return TRUE;

	}

	// Mutator
	public function setTitleAttribute($value)
  {
      $this->attributes['title'] = ucwords(strtolower($value));
  }

  // Presenter - Initializer
  public function getPresenter()
  {
  	return new PositionPresenter($this);
  }

}