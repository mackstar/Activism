<?php

namespace Mackstar\Activism\Utilities;

class Inflector
{
	public static function camelCase($string) {
		$string = str_replace(array(
			'-', '_'
		), ' ', $string);
		$string = ucwords($string);
		return str_replace(' ', '', $string);
	}
}