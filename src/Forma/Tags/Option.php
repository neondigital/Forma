<?php namespace Forma\Tags;

use \Lang;

class Option extends BaseTag
{
    protected $tagName = 'option';

    function __construct($text=null,$value=null,$selected=false)
    {
        if ($value !== null)
            $this->attributes['value'] = $value;

        if ($selected)
            $this->attributes['selected'] = null;

        $this->text = \Forma\Helpers::hasLang($text) ? \Forma\Helpers::lang($text) : $text; 
    }

}