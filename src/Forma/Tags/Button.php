<?php namespace Forma\Tags;

class Button extends BaseTag
{
    protected $tagName = 'button';
    protected $hasValue = false;

    function __construct($text=null, $type=null)
    {
        $this->text = $text; 

        if ($type !== null)
            $this->attributes['type'] = $type;
    }

}