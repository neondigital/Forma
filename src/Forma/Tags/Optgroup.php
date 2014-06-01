<?php namespace Forma\Tags;

use \Lang;

class Optgroup extends BaseTag
{
    protected $tagName = 'optgroup';
    protected $selected;
    
    function __construct($label=null,$options=null,$selected=false)
    {
        if ($label)
            $this->attributes['label'] = $label;
  
        $this->selected = $selected;

        $this->options($options);
    }

    public function option($text, $value=null, $selected=false)
    {
        $this->child(new Option($text, $value, $selected));

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