<?php

namespace Realodix\CsConfig\Helper;

class ClassHelper
{
    /**
     * Get the class basename.
     *
     * @param  object  $class
     */
    public static function classBasename($class): string
    {
        if (! is_object($class)) {
            throw new \TypeError(
                'Argument #1 ($class) must be of type object, '.gettype($class).' given'
            );
        }

        $class = get_class($class);

        return basename(str_replace('\\', '/', $class));
    }
}
