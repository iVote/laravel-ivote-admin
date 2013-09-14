<?php

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
	// Ardent - Relational Entities
  public static $relationsData = array(
  	'roles' => array(self::BELONGS_TO_MANY, 'Role', 'table' => 'permission_role')
  );
}