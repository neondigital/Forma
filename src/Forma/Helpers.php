<?php namespace Forma;

class Helpers
{

    public static function url($string)
    {
        if (static::isLaravel())
        {
            return \URL::to($string);
        }

        return $string;
    }

    public static function hasLang($string)
    {
        if (static::isLaravel())
        {
            return \Lang::has($string);
        }

        return false;
    }

    public static function lang($string)
    {
        if (static::isLaravel())
        {
            return \Lang::get($string);
        }

        return $string;
    }

    public static function input($string)
    {
        if (static::isLaravel())
        {
            return \Request::get($string);
        }

        return isset($_REQUEST[$string]) ? $_REQUEST[$string] : false;
    }

    public static function inputOld($string)
    {
        if (static::isLaravel())
        {
            return \Request::old($string);
        }

        return false;
    }

    public static function isLaravel()
    {
        return class_exists('Illuminate\Foundation\Application');
    }
}