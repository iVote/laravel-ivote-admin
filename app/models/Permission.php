<?php

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission implements Presentable
{
	// Ardent - Relational Entities
  public static $relationsData = array(
  	'roles' => array(self::BELONGS_TO_MANY, 'Role', 'table' => 'permission_role')
  );



  // Presenter
  
  public function getPresenter()
  {
  	return new PermissionPresenter($this);
  }
  
}