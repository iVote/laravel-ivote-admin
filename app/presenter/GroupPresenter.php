<?php 

/**
*
*/
class GroupPresenter extends Presenter
{
	public function presentPositionsValue()
	{ 
		$positionLabel = '';

		foreach ($this->positions as $position) {
			$positionLabel .= $position->title . ', ';
		}

		return $positionLabel;
	}
}