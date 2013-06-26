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

    public static function underscore($string) {
        $string = str_replace('-', '_', $string);
        $string = preg_replace('/(?<=\\w)([A-Z])/', '_\\1', $string);
        return strtolower($string);
    }
}