<?php

class SecurityController extends BaseController {

	public function getLogin()
	{
		return Auth::check() ? Redirect::to( '/' ) : View::make( 'security.login' );
	}

	public function getLogout()
	{
		Auth::logout();

		Notification::success( '<span class="glyphicon glyphicon-info-sign"></span> You have successfully logged out' );

		return Redirect::to( 'security/login' );
	}

	public function postAuthenticate()
	{

		$login = array( 'username' => Input::get( 'username' ), 'password' => Input::get( 'password' ) );

		if ( Auth::attempt( $login  ) ) {
			return Redirect::intended( '/' );
		} 
		
		Notification::warning( '<span class="glyphicon glyphicon-warning-sign"></span> Incorrect username or password!' );

		return Redirect::to( 'security/login' )->withInput();

	}

}
