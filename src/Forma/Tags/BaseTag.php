<?php namespace Forma\Tags;

use Forma\Interfaces\TagInterface;
use \DOMDocument;
use \Input;

class BaseTag implements TagInterface
{

    protected $tagName;
    protected $hasValue = false;
    protected $attributes = array();
    protected $childTags = array();
    protected $text;
    protected $rawText = false;

    // Allow traits to add additional processing
    protected $preRenders = array();
    protected $postRenders = array();

    public function render()
    {
        $tagString = '';

        // Pre-Renders
        foreach ($this->preRenders as $func)
        {
            $tagString .= $this->{$func}();
        }

        $tagString .= "<".$this->tagName;

        // Determine value??
        if ($this->hasValue and isset($this->attributes['name']))
        {
            // Try this request first
            if (\Forma\Helpers::input($this->attributes['name']))
            {
                $this->attributes['value'] = \Forma\Helpers::input($this->attributes['name']);
            }

            // Old input
            if (\Forma\Helpers::inputOld($this->attributes['name']))
            {
                $this->attributes['value'] = \Forma\Helpers::inputOld($this->attributes['name']);
            }

            // Try populated values
            if (\Forma::hasValue($this->attributes['name']))
            {
                $this->attributes['value'] = \Forma::getValue($this->attributes['name']);
            }
        }

        // Attributes
        foreach ($this->attributes as $a => $v)
        {
            if ($v !== null)
                $tagString .= " " . $a . "=\"" . $this->encode($v) . "\"";
            else
                $tagString .= " " . $a;
        }

        // End start tag
        $tagString .= ">";

        // Child tags
        if (count($this->childTags))
        {
            foreach ($this->childTags as $t)
                $tagString .= $t;

            // Create end tag
            $tagString .= "</".$this->tagName.">";
        }
        elseif ($this->text)
        {
            $tagString .= $this->rawText ? $this->text : $this->encode($this->text);

            // Create end tag
            $tagString .= "</".$this->tagName.">";
        }

        // Post-Renders
        foreach ($this->postRenders as $func)
        {
            $tagString .= $this->{$func}();
        }

        return $tagString;
    }

    /**
     * So we can have a method called "class" :-)
     */
    public function __call($name, $arguments)
    {
        if ($name == "class")
        {
            return call_user_func_array(array(__NAMESPACE__ .'\BaseTag', 'addClass'), $arguments);
        }
    }

    public function addClass($class_name)
    {
        if (!isset($this->attributes['class']))
            $this->attributes['class'] = '';

        $this->attributes['class'] .= $class_name . " ";
        return $this;
    }

    public function attr($key,$value)
    {
        $this->attributes[$key] = $value;
        return $this;
    }

    public function attribs($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    public function id($value)
    {
        $this->attributes['id'] = $value;
        return $this;
    }

    public function forceEmpty()
    {
        unset($this->attributes['value']);
        $this->hasValue = false;
        return $this;
    }

    public function allowValue()
    {
        $this->hasValue = true;
        return $this;
    }

    public function child($tag)
    {
        $this->childTags[] = $tag;
        return $this;
    }

    public function __toString()
    {
        return $this->render();
    }

    public function rawText()
    {
        $this->rawText = true;
        return $this;
    }

    protected function encode($string)
    {
        return trim(htmlentities($string, ENT_QUOTES, 'UTF-8', false));
    }

}