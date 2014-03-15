<?php namespace Forma\Tags;

class Email extends Input
{
    function __construct($name=null, $value=null)
    {
        parent::__construct($name, $value);

        $this->attributes['type'] = 'email';   
    }
}