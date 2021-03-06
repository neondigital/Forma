<?php namespace Forma\Traits;

use Forma\Tags\Label;

trait WithLabel
{
    protected $withLabel;
    protected $autoID;

    public function preRenderWithLabel()
    {
        if ($this->withLabel)
        {
            if ($this->autoID and !isset($this->attributes['id']) and isset($this->attributes['name']))
            {
                $this->attributes['id'] = 'input' . ucfirst($this->attributes['name']);
            }

            $label = new Label($this->withLabel);

            if (isset($this->attributes['id']))
                $label->for($this->attributes['id']);

            return (string) $label;
        }

        return "";
    }

    public function withLabel($text, $autoID=true)
    {
        $this->withLabel = $text;
        $this->autoID = $autoID;

        return $this;
    }
}
