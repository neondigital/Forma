<?php namespace Forma\Tags;

use Forma\Traits\WithLabel;
use Forma\Traits\WrapLabel;
use Forma\Traits\Placeholder;

class Input extends BaseTag
{
    use WithLabel;
    use WrapLabel;
    use Placeholder;

    protected $tagName = 'input';
    protected $hasValue = true;

    function __construct($name=null, $value=null)
    {
        $this->attributes['type'] = 'text';

        if ($name !== null)
            $this->attributes['name'] = $name;  
            
        if ($value !== null)
            $this->attributes['value'] = $value;      

        // Add pre-renders for traits
        $this->preRenders[] = 'preRenderWithLabel';
        $this->preRenders[] = 'preRenderWrapLabel';

        // Add post-renders for traits
        $this->postRenders[] = 'postRenderWrapLabel';         
    }

    public function type($type)
    {
        $this->attributes['type'] = $type;
        return $this;
    }
}