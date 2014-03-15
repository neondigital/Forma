<?php namespace Forma\Tags;

class Checkbox extends Input
{
    protected $hidden_field = true;
    protected $hasValue = false;

    function __construct($name=null, $value=null)
    {
        parent::__construct($name, $value);

        $this->attributes['type'] = 'checkbox';

        // Try this request first
        if (\Input::get($this->attributes['name']) == $value)
        {
            $this->checked();
        }

        // Old input
        if (\Input::old($this->attributes['name']) == $value)
        {
            $this->checked();
        }

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