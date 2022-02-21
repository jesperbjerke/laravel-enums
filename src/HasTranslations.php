<?php

namespace Bjerke\Enum;

interface HasTranslations
{
    /**
     * Returns all defined cases of Enum as array where key
     * is case name and value is enum value
     */
    public static function getCasesAsArray(): array;

    /**
     * Returns the translation key-path (dot-notation) for this enum class
     */
    public static function getTranslationKey(): string;

    /**
     * Returns all translated enums of this class as value => translation
     */
    public static function getTranslations(): array;

    /**
     * Returns translation for this enum case
     */
    public function translate(): string;
}
