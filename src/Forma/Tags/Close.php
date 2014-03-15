<?php namespace Forma\Tags;

class Close extends BaseTag
{
    protected $tagName = 'form';

    public function render()
    {
        return "</" . $this->tagName . ">";
    }
}