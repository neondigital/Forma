<?php namespace Forma;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class Helpers
{

    public static function url($string)
    {
        if (static::isLaravel())
        {
            return (new URL())->to($string);
        }

        return $string;
    }

    public static function hasLang($string): bool
    {
        if (static::isLaravel())
        {
            return (new Lang)->has($string);
        }

        return false;
    }

    public static function lang($string)
    {
        if (static::isLaravel())
        {
            return (new Lang)->get($string);
        }

        return $string;
    }

    public static function input($string)
    {
        if (static::isLaravel())
        {
            return (new Request)->get($string);
        }

        return $_REQUEST[$string] ?? false;
    }

    public static function inputOld($string)
    {
        if (static::isLaravel())
        {
            return (new Request)->old($string);
        }

        return false;
    }

    public static function isLaravel(): bool
    {
        return class_exists('Illuminate\Foundation\Application');
    }
}