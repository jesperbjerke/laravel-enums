<?php

namespace Bjerke\Enum;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

trait UsesTranslations
{
    /**
     * Returns all defined cases of Enum as array where key
     * is case name and value is enum value
     */
    public static function getCasesAsArray(): array
    {
        $cases = self::cases();
        $remappedCases = [];
        foreach ($cases as $case) {
            $remappedCases[$case->name] = $case->value;
        }
        return $remappedCases;
    }

    public static function getTranslationKey(): string
    {
        return 'enums.' . Str::snake(class_basename(get_called_class()));
    }

    /**
     * Returns all translated enums of this class as value => translation
     */
    public static function getTranslations(): array
    {
        $translations = Lang::get(self::getTranslationKey());
        return (is_array($translations)) ? $translations : [];
    }

    /**
     * Returns all translated enums of this class as value => translation
     */
    public function translate(): string
    {
        return Lang::get(self::getTranslationKey() . '.' . $this->value);
    }
}
