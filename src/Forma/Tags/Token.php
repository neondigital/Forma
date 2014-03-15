<?php namespace Forma\Tags;

class Token extends Input
{
    function __construct()
    {
        parent::__construct('_token', \Session::getToken());

        $this->attributes['type'] = 'hidden';   
    }
}