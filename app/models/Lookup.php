<?php

class Lookup extends Ardent implements Presentable {
	
	// Ardent - Auto Hydration
	public $autoHydrateEntityFromInput    = true;
	public $forceEntityHydrationFromInput = true;

	// Ardent - Relational Entities
  public static $relationsData = array(
		'lookupType'       => array( self::BELONGS_TO, 'LookupType' )
  );

  // Get all extra fields for administrator pages
  public static function getAdminMetas() 
  {
    return LookupType::find( LookupType::$administratorMetaId )->lookups;
  }

  // Get all extra fields for administrator pages
  public static function getSecurityQuestionMetas() 
  {
  	return LookupType::find( LookupType::$securityQestionId )->lookups;
  }

	// Presenter - Initializer
  public function getPresenter()
  {
  	return new LookupPresenter($this);
  }

}