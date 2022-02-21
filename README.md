# Laravel Enums

This package provides a trait with helper methods for enum management and translation in Laravel.

__Important:__ This package has been rebuilt as of v2 to work with native PHP enums instead of class constants. As such, PHP 8.1 is now required. See [UPGRADE.md](UPGRADE.md) for more details.

### Requirements:

* PHP 8.1 or higher
* Will only work with [backed enums](https://www.php.net/manual/en/language.enumerations.backed.php)

### Installation:

```shell script
composer require bjerke/laravel-enums
```

## Usage:

```php
namespace App\Enums;

use Bjerke\Enum\HasTranslations;
use Bjerke\Enum\UsesTranslations;

enum PostStatus: int implements HasTranslations {
    use UsesTranslations;

    case DRAFT = 10;
    case PUBLISHED = 20;
    case ARCHIVED = 30;
}
```

Which will then allow you to define the translated versions of these values in Laravel translation file called `enums.php`:

```php
// ../resources/lang/en/enum.php

use App\Enums\MyEnum;

return [
    'post_status' => [
        PostStatus::DRAFT->value => 'Draft',
        PostStatus::PUBLISHED->value => 'Published'
        PostStatus::ARCHIVED->value => 'Archived'
    ]
];
```

Which in turn will enable you to fetch the translated values as:
```php
PostStatus::DRAFT->translate(); // return translation for this case
PostStatus::getTranslations(); // return all translations
```

There's also a helper method for retrieving cases:

`PostStatus::getCasesAsArray()` - Returns an array of "enum key" => "enum value"
