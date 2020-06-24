# Laravel Enums

Base-class for easier enum management and translation in Laravel.

### Installation:

```shell script
composer require bjerke/enum
```

## Usage:

```php
namespace App\Enums;

use Bjerke\Enum\BaseEnum;

final class MyEnum extends BaseEnum
{
    public const MY_VALUE = 1;
    public const MY_OTHER_VALUE = 0;
}

```

Which will then allow you to define the translated versions of these values in Laravel translation file called `enums.php`:

```php
// ../resources/lang/en/enum.php

use App\Enums\MyEnum;

return [
    'my_enum' => [
        MyEnum::MY_VALUE => 'My value',
        MyEnum::MY_OTHER_VALUE => 'My other value'
    ]
];

```

Which in turn will enable you to fetch the translated values as:
```php
MyEnum::getTranslated();
```

There's also some helper methods for retrieving the constants:

`MyEnum::getConstants()` - Returns an array of "enum key" => "enum value"

`MyEnum::getConstantsFlipped()` - Returns an array of "enum value" => "enum key"
