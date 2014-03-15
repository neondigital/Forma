<?php namespace Forma\Tags;

use Forma\Traits\Required;

class Textarea extends BaseTag
{
    use Required;

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