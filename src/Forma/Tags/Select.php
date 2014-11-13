<?php namespace Forma\Tags;

use Forma\Traits\WithLabel;
use Forma\Traits\WrapLabel;

class Select extends BaseTag
{
    use WithLabel;
    use WrapLabel;

    protected $tagName = 'select';
    protected $selected;

    function __construct($name=null, $options=null, $selected=null, $multiple=true)
    {
        if ($name !== null)
            $this->attributes['name'] = $name;  
            
        if ($selected !== null)
            $this->selected = $selected;  

        if (!$this->selected)
        {
            // Try this request first
            if (\Forma\Helpers::input($this->attributes['name']))
            {
                $this->selected = \Forma\Helpers::input($this->attributes['name']);
            }

            // Old input
            if (\Forma\Helpers::inputOld($this->attributes['name']))
            {
                $this->selected = \Forma\Helpers::inputOld($this->attributes['name']);
            }
        }

        if ($multiple)
        {
            $this->attr('multiple',true);
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
        if (is_array($text))
        {
            $this->child(new Optgroup($value, $text, $this->selected));
        }
        else
        {
            $this->child(new Option($text, $value, $selected));
        }

        return $this;
    }

    public function options(Array $options)
    {
        foreach ($options as $value => $text)
        {
            if (is_array($this->selected))
            {
                $selected = in_array($value,$this->selected);
            }
            else
            {
                $selected = ($this->selected == $value);
            }

            $this->option($text, $value, $selected);
        }
        return $this;
    }

}