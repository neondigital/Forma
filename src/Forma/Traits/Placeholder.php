<?php namespace Forma\Traits;

use \Lang;

trait Placeholder
{
    public function placeholder($text)
    {
        $this->attributes['placeholder'] = \Forma\Helpers::hasLang($text) ? \Forma\Helpers::lang($text) : $text;
        return $this;
    }
}
