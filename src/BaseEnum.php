<?php

namespace Bjerke\Enum;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

abstract class BaseEnum
{
    public static $constCacheArray;

    /**
     * Returns name for specific enum constant
     *
     * @param $const
     *
     * @return string|int|null
     * @throws \ReflectionException
     */
    public static function getConstantName($const)
    {
        $constants = self::getConstants();

        foreach ($constants as $key => $value) {
            if ($value === $const) {
                return $key;
            }
        }

        return null;
    }

    /**
     * Returns all defined constants of Enum
     *
     * @return array
     * @throws \ReflectionException
     */
    public static function getConstants()
    {
        if (self::$constCacheArray === null) {
            self::$constCacheArray = [];
        }
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new \ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }

        return self::$constCacheArray[$calledClass];
    }

    /**
     * Returns all defined constants of Enum with constant values as keys and constant names as values
     *
     * @return array
     * @throws \ReflectionException
     */
    public static function getConstantsFlipped()
    {
        return array_flip(self::getConstants());
    }

    /**
     * Returns all translated enums of this class as value => translation
     *
     * @return array
     */
    public static function getTranslated()
    {
        return Lang::get('enums.' . Str::snake(class_basename(get_called_class())));
    }
}
