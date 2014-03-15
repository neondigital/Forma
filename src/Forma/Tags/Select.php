<?php namespace Forma\Tags;

use Forma\Traits\WithLabel;
use Forma\Traits\WrapLabel;

class Select extends BaseTag
{
    use WithLabel;
    use WrapLabel;

    protected $tagName = 'select';
    protected $selected;

    function __construct($name=null, $options=null, $selected=null)
    {

        if ($name !== null)
            $this->attributes['name'] = $name;  
            
        if ($selected !== null)
            $this->selected = $selected;  

        if (!$this->selected)
        {
            // Try this request first
            if (\Input::get($this->attributes['name']))
            {
                $this->selected = \Input::get($this->attributes['name']);
            }

            // Old input
            if (\Input::old($this->attributes['name']))
            {
                $this->selected = \Input::old($this->attributes['name']);
            }
        }


        if (is_array($options))
        {
            $this->options($options);
        }

        // Add pre-renders for traits
        $this->preRenders[] = 'preRenderWithLabel';
        $this->preRenders[] = 'preRenderWrapLabel';

        // Add post-renders for traits
        $this->postRenders[] = 'postRenderWrapLabel'; 
    }

    public function option($text, $value=null, $selected=false)
    {
        $this->child(\Forma::option($text, $value, $selected));
        return $this;
    }

    public function options(Array $options)
    {
        foreach ($options as $value => $text)
        {
            $this->option($text, $value, $this->selected == $value);
        }
        return $this;
    }

}