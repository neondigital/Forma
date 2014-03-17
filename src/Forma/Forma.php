<?php namespace Forma;

class Forma
{

    public static $populate_values = array();

    public function __call($name, $arguments)
    {
        $options = array();

        if (strpos($name,"_"))
        {
            // We have extras!
            $options = explode('_',$name);
            $name = array_shift($options);
        }

        // So we can call lowercase classes in normal PHP
        $name = ucfirst($name);

        $field_type = "Forma\\Tags\\".$name;

        if (class_exists($field_type))
        {
            $r = new \ReflectionClass($field_type);
            $tag = $r->newInstanceArgs($arguments);

            foreach ($options as $o)
            {
                // call option
                $tag->{$o}();
            }

            return $tag;
        }

        // Throw exception
        throw new \Exception('Tag type not found: '.$field_type);

        return '';
    }

    public function populate($data)
    {

        // Do we have an object?
        if (is_object($data))
        {
            $data = get_object_vars($data);            
        }

        static::$populate_values = $data;
    }

    public static function hasValue($field)
    {
        return isset(static::$populate_values[$field]);
    }

    public static function getValue($field)
    {
        return static::$populate_values[$field];
    }

}