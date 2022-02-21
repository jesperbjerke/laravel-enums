# Upgrade

## From v1 to v2

* The base class from v1 has been turned into a trait called `UsesTranslations`. You can also choose to implement the interface `HasTranslations`, which will allow for better extendability.
* Convert your existing enum classes to actual enums and the constants to cases. Make sure you are defining the correct backed type of the enum, since this package will not work with non-backed enums.
* Add `->value` to all array keys in your translation files. Since the enum case itself cannot be an array key. See [README.md](README.md) for examples.
* The method `getTranslated()` has been reimplemented as `getTranslations()`
* The method `getConstants()` has been reimplemented as `getCasesAsArray()`
* The method `getConstantName()` has been removed since it no longer serves a purpose with what native enums already provides
* the method `getConstantsFlipped()` has been removed

