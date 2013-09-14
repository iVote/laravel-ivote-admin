<?php 

/**
*
*/
class RolePresenter extends Presenter
{
	public function presentIsAdmin()
	{
		// 1 is the absolute ID of the Administrator Role
		if ( 1 == $this->id ) {
			return TRUE;
		}
		return FALSE;
	}

}