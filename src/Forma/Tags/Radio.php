<?php namespace Forma\Tags;

class Radio extends Checkbox
{

    function __construct($name=null, $value=null)
    {
        parent::__construct($name, $value);

        $this->attributes['type'] = 'radio';
    }

}