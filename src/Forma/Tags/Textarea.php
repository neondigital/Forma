<?php namespace Forma\Tags;

use Forma\Traits\WithLabel;
use Forma\Traits\Placeholder;
use Forma\Traits\Required;

class Textarea extends BaseTag
{
    use Required;
    use Placeholder;
    use WithLabel;

    protected $tagName = 'textarea';
    protected $hasValue = false;

    function __construct($name=null, $text=null)
    {
        $this->attributes['name'] = $name;
        $this->text = $text ? $text : ''; 

        // Add pre-renders for traits
        $this->preRenders[] = 'preRenderWithLabel';
    }

    public function rows($rows)
    {
        $this->attributes['rows'] = $rows;
        return $this;
    }

}