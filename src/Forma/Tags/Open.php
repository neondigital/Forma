<?php namespace Forma\Tags;

class Open extends BaseTag
{
    protected $tagName = 'form';
    protected $secure = false;

    function __construct($action=null, $method='POST', $secure=false)
    {
        if ($action !== null)
            $this->action($action, $secure);  
            
        if ($method !== null)
            $this->attributes['method'] = $method;        
    }

    public function action($action, $secure = true)
    {
        $this->attributes['action'] = \URL::to($action, array(), $secure);
        return $this;
    }

    public function method($method)
    {
        $this->attributes['method'] = $method;
        return $this;
    }

    public function secure()
    {
        $this->secure = true;
        $this->attributes['action'] = str_replace('http://', 'https://', $this->attributes['action']);
        return $this;
    }

    public function post()
    {
        $this->attributes['method'] = 'POST';
        return $this;
    }

    public function get()
    {
        $this->attributes['method'] = 'GET';
        return $this;
    }

    public function files()
    {
        $this->attributes['enctype'] = 'multipart/form-data';
        return $this;
    }

}