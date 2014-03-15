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
        $field_type = "Forma\\Tags\\".$name;

        if (class_exists($field_type))
        {
            $r = new \ReflectionClass($field_type);
            return $r->newInstanceArgs($arguments);
        }

        // Throw exception
        throw new \Exception('Tag type not found: '.$field_type);

        return '';
    }

}