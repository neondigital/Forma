<?php namespace Forma;

class Forma
{

/**
 * Forma::text()->default()->class()->id()
 *
 * auto ID's e.g. id="inputTelephone"
 */

    public function __call($name, $arguments)
    {
        $options = array();

        if (strpos($name,"_"))
        {
            // We have extras!
            $options = explode('_',$name);
            $name = array_shift($options);
        }

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

}