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

        $this->text = Lang::has($text) ? Lang::get($text) : $text; 
    }

}