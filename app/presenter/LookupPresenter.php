<?php 

/**
*
*/
class LookupPresenter extends Presenter
{
	
	public function presentControlName()
	{
		return "lookup_id_{$this->id}";
	}

	public function presentViewText()
	{
		return ucwords( strtolower( $this->value ) );
	}

}