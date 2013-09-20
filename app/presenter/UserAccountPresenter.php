<?php 

/**
*
*/
class UserAccountPresenter extends Presenter
{
	public function presentFullname()
	{
		return ucwords( strtolower( "{$this->firstname} {$this->lastname}" ) );
	}

	public function presentSuper()
	{
		return 1 == $this->id ? TRUE : FALSE;
	}

	public function presentMetaValues()
	{
		return json_decode( $this->lookup_meta_values )->metas;
	}

	public function presentSecurityValues()
	{
		return json_decode( $this->lookup_meta_values )->security;
	}

	public function presentSecurityQuestion()
	{		
		if ( !is_object( $this->securityValues ) && empty( $this->securityValues ) ) {
			return NULL;
		}

		$question = Lookup::find( $this->securityValues->lookup_id )->value;

		return ends_with( $question, '?' ) ? $question : $question . '?';
	}

	public function presentSecurityAnswer()
	{		
		return !is_object( $this->securityValues ) && empty( $this->securityValues ) ? NULL : strtolower( $this->securityValues->value );
	}

}