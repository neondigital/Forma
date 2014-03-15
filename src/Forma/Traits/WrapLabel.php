<?php namespace Forma\Traits;

trait WrapLabel
{
    protected $labelWrap;
    protected $labelWrapAttributes;

    public function preRenderWrapLabel()
    {
        if ($this->labelWrap)
        {   
            return (string) \Forma::label()->attribs($this->labelWrapAttributes);
        }

        return "";
    }

    public function postRenderWrapLabel()
    {
        if ($this->labelWrap)
        {   
            return $this->encode($this->labelWrap) . "</label>";
        }

        return "";
    }

    public function wrap($text, $attributes=array())
    {
        $this->labelWrap = $text;
        $this->labelWrapAttributes = $attributes;
        return $this;
    }
}
