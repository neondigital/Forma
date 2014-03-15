<?php namespace Forma\Tags;

class Checkbox extends Input
{
    protected $hidden_field = true;

    function __construct($name=null, $value=null)
    {
        parent::__construct($name, $value);

        $this->attributes['type'] = 'checkbox';

        // Add pre-render
        $this->preRenders[] = 'preRenderCheckboxHidden';
    }

    public function checked()
    {
        $this->attributes['checked'] = null; 
        return $this;
    }

    public function omitHidden()
    {
        $this->hidden_field = false; 
        return $this;
    }

    public function preRenderCheckboxHidden()
    {
        if ($this->hidden_field and isset($this->attributes['name']) and isset($this->attributes['value']))
        {
            return \Forma::hidden($this->attributes['name'],'0');
        }

        return "";
    }

}