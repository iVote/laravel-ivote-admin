<?php 

/**
*
*/
class GroupPresenter extends Presenter
{
	public function presentPositionsList()
	{ 
		$positionsList = '';

		foreach ($this->positions as $position) {
			$positionsList .= $position->title . ', ';
		}

		return $positionsList;
	}
}