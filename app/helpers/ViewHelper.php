<?php

class ViewHelper {

	/**
	 * Get the controller of the current page.
	 *
	 * @return Response
	 */
	public static function getCurrentController()
	{
		return Request::segment(1);
	}


	/**
	 * Get the search placeholder value. 
	 * If param is empty, return with controller value of the current page
	 *
	 * @param  string  $value
	 * @return Response
	 */
	public static function getSearchPlaceHolderValue($value = '')
	{
		return "Search " . ucwords(!empty($value) ? $value : Str::singular(self::getCurrentController()));
	}


	/**
	 * Get the route for view forms. 
	 * Use this method for dynamic changing of route value only.
	 * If param is empty, return with controller value of the current page
	 *
	 * @param  string  $value
	 * @return Response
	 */
	public static function getRoute($value = '')
	{
		return !empty($value) ? $value : self::getCurrentController();
	}
}