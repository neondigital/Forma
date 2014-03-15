<?php namespace Forma\Traits;

use \Lang;

trait Placeholder
{
    public function placeholder($text)
    {
        $this->attributes['placeholder'] = Lang::has($text) ? Lang::get($text) : $text;
        return $this;
    }
}
