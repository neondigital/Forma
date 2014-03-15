<?php namespace Forma\Traits;

trait Required
{
    public function required()
    {
        $this->attributes['required'] = null; 
        return $this;
    }
}
