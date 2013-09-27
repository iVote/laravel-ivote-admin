<?php

class ViewHelper {

	public static $currentPage;
	
	public static function setPage($value)
	{
		self::$currentPage = $value;
	}

	public static function getSearchPlaceHolderValue($value = '')
	{
		return "Search " . ucwords(!empty($value) ? $value : self::$currentPage);
	}

	public static function getRoute($value = '')
	{
		return Str::plural(!empty($value) ? $value : self::$currentPage);
	}
}