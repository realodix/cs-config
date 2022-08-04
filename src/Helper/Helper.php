<?php

namespace Realodix\CsConfig\Helper;

class Helper
{
    /**
     * Get the class basename.
     */
    public static function classBasename(object $class): string
    {
        $class = get_class($class);

        return basename(str_replace('\\', '/', $class));
    }
}
