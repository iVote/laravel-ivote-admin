<?php

use Zizaco\Entrust\EntrustRole;

// Entrust is automatically using Ardent for validation
// which is really cool in my opinion...
class Role extends EntrustRole implements Presentable
{
	// Ardent - Auto Hydration
	public $autoHydrateEntityFromInput    = true;
	public $forceEntityHydrationFromInput = true;

	// Ardent - Relational Entities
  public static $relationsData = array(
		'permissions' => array(self::BELONGS_TO_MANY, 'Permission', 'table' => 'permission_role'),
		'users'       => array(self::BELONGS_TO_MANY, 'User', 'table' => 'assigned_role')
  );

  // Ardent - Validation Rules
	public static $rules = array(
		'name' => array('required', 'regex:^[A-z ][-\'a-zA-Z0-9\s]+$^', 'between:2,20') 
		// The regex pattern will accept the following:
		// Role sample
		// Role1231
		// role sample123
		// role-'123 asdsd
	);

	// Ardent - Custom Validation Messages
	public static $customMessages = array(
		'regex' => 'Name pattern should start with a letter and only allow letters, numbers, space, dash and quote.' 
	);

	// Laravel - Fillable Attributes
	protected $fillable = array('name', 'description');

	// Mutator
	public function setNameAttribute($value)
  {
      $this->attributes['name'] = ucwords($value);
  }

  // Presenter - Initializer
  public function getPresenter()
  {
  	return new RolePresenter($this);
  }

}