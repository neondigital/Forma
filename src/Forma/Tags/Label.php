<?php namespace Forma\Tags;

use \Lang;

class Label extends BaseTag
{
    protected $tagName = 'label';
    protected $hasValue = false;

    function __construct($text=null)
    {
        $this->text = \Forma\Helpers::hasLang($text) ? \Forma\Helpers::lang($text) : $text; 
    }

    /**
     * So we can have a method called "for" :-)
     */
    public function __call($name, $arguments)
    {
        if ($name == "for")
        {
            return call_user_func_array(array(__NAMESPACE__ .'\Label', 'addFor'), $arguments);
        }
    }

    public function addFor($id)
    {
        $this->attributes['for'] = $id;

        return $this;
    }

}