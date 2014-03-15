<?php namespace Forma\Tags;

class Submit extends Input
{
    protected $hasValue = false;

    function __construct($name=null, $value=null)
    {
        parent::__construct($name, $value);

        $this->attributes['type'] = 'submit';   
    }
}