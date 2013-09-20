<?php

class LookupType extends Ardent implements Presentable {
	
	public static $memberMetaId           = 1; // Members Lookup Type Id
	public static $administratorMetaId    = 2; // Administrators Lookup Type Id
	public static $candidatesMetaId       = 3; // Candidates Lookup Type Id
	public static $securityQuestionMetaId = 4; // Security Questions Lookup Type Id 
	public static $settingMetaId          = 5; // Settings Lookup Type Id

	// Ardent - Relational Entities
  public static $relationsData = array(
		'lookups'       => array( self::HAS_MANY, 'Lookup' )
  );

  // Presenter - Initializer
  public function getPresenter()
  {
  	return new LookupTypePresenter($this);
  }

}