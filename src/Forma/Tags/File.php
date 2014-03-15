<?php namespace Forma\Tags;

class File extends Input
{
    function __construct($name=null)
    {
        parent::__construct($name, null);

        $this->attributes['type'] = 'file';   
    }
}