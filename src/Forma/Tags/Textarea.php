<?php namespace Forma\Tags;

class Textarea extends BaseTag
{
    protected $tagName = 'textarea';
    protected $hasValue = false;

    function __construct($name=null, $text=null)
    {
        $this->attributes['name'] = $name;
        $this->text = $text; 
    }

    public function rows($rows)
    {
        $this->attributes['rows'] = $rows;
        return $this;
    }

}