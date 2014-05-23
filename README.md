# Belt

[![Build Status](https://travis-ci.org/ilya-dev/belt.svg?branch=master)](https://travis-ci.org/ilya-dev/belt)
[![Latest Stable Version](https://poser.pugx.org/ilya/belt/v/stable.svg)](https://packagist.org/packages/ilya/belt)
[![Total Downloads](https://poser.pugx.org/ilya/belt/downloads.svg)](https://packagist.org/packages/ilya/belt)
[![Latest Unstable Version](https://poser.pugx.org/ilya/belt/v/unstable.svg)](https://packagist.org/packages/ilya/belt)
[![License](https://poser.pugx.org/ilya/belt/license.svg)](https://packagist.org/packages/ilya/belt)

A handful of tools for PHP developers.

> Version **2.0.0** is out now. Clear documentation, improved tests and code quality.

## Table Of Content

1. [License](#license)
2. [Requirements](#requirements)
3. [Installation](#installation)
4. [Example](#quantumview-class)
5. [What It Offers](#what-it-offers)
6. [Documentation](#documentation)
    * [Utilities](#documentation-utilities)
        * [Random](#documentation-utilities-random)
7. [Development](#development)
    * [Plans](#development-plans)
    * [Features](#development-features)

<a name="license"></a>
## License

Belt is licensed under the MIT license.

<a name="requirements"></a>
## Requirements

This library uses PHP 5.4+.

<a name="installation"></a>
## Installation

In case you want to try it out, run:

`php composer.phar require "ilya/belt:~2"`

That will add Belt to your project as a Composer dependency.

<a name="example"></a>
## Example

A little taste of Belt:

```php

use Belt\Belt;

Belt::max([1, 2, 3]) // => 3

Belt::flatten([1, [2, [3]]]) // => [1, 2, 3]

Belt::last([1, 2, 3], 2) // => [2, 3]

```

<a name="what-it-offers"></a>
## What It Offers

+ **60+** useful functions that you can use in your projects.
+ Belt is fully tested.
+ The source code is clean and documented.

Here is what is available to you:

+ `boolean isDate(mixed $value)`
+ `boolean isNumber(mixed $value)`
+ `boolean isString(mixed $value)`
+ `boolean isFunction(mixed $value)`
+ `boolean isEmpty(mixed $value)`
+ `boolean isEqual(mixed $left, mixed $right)`
+ `boolean isBoolean(mixed $value)`
+ `boolean isObject(mixed $value)`
+ `boolean isArray(mixed $value)`
+ `boolean isTraversable(mixed $value)`
+ `boolean isNull(mixed $value)`
+ `boolean has(mixed $object, string $key)`
+ `array keys(mixed $object)`
+ `array values(mixed $object)`
+ `array methods(mixed $object)`
+ `mixed copy(mixed $value)`
+ `mixed extend(mixed $source, mixed $destination)`
+ `mixed apply(mixed $object, callable $closure)`
+ `mixed defaults(mixed $object, array|mixed $defaults)`
+ `string escape(string $string)`
+ `string id(string $prefix = '')`
+ `string random(int $length, string $type, bool $onlyUppercase)`
+ `mixed with(mixed $value)`
+ `void times(integer $number, callable $closure)`
+ `mixed cache(callable $closure)`
+ `mixed wrap(callable $closure, callable $wrapper)`
+ `mixed compose(array $closures, array $arguments = array())`
+ `void once(callable $closure)`
+ `mixed after(integer $number, callable $closure)`
+ `mixed|array first(array $elements, integer $amount = 1)`
+ `array initial(array $elements, integer $amount = 1)`
+ `array rest(array $elements, integer $index = 1)`
+ `mixed|array last(array $elements, integer $amount = 1)`
+ `array pack(array $elements)`
+ `array flatten(array $elements)`
+ `array range(integer $to, integer $from = 0, integer $step = 1)`
+ `array difference(array $one, array $another)`
+ `array unique(array $elements, callable $iterator = null)`
+ `array without(array $elements, array $ignore)`
+ `array zip(array $one, array $another)`
+ `integer indexOf(array $elements, mixed $element)`
+ `array intersection(array $one, array $another)`
+ `array union(array $one, array $another)`
+ `void each(array $collection, callable $iterator)`
+ `array map(array $collection, callable $iterator)`
+ `array toArray(mixed $value)`
+ `integer|null size(array|Countable $value)`
+ `array shuffle(array $collection)`
+ `boolean any(array $collection, callable $iterator)`
+ `boolean all(array $collection, callable $iterator)`
+ `array reject(array $collection, callable $iterator)`
+ `array pluck(array $collection, string $key)`
+ `boolean contains(array $collection, mixed $value)`
+ `array invoke(array $collection, string $function)`
+ `mixed reduce(array $collection, callable $iterator, mixed $initial = 0)`
+ `array sortBy(array $collection, callable $iterator)`
+ `array groupBy(array $collection, callable $iterator)`
+ `mixed max(array $collection)`
+ `mixed min(array $collection)`

<a name="documentation"></a>
## Documentation

<a name="documentation-utilities"></a>
### Utilities

<a name="documentation-utilities-random"></a>
#### Random

Generate random strings.

**Paramaters:**
  * `lenght` The lenght of the string to generate
  * `type` *Optional* The type of string to generate: `Utilities::RANDOM_TYPE_ALNUM`, `Utilities::RANDOM_TYPE_HEXA`, `Utilities::RANDOM_TYPE_ALPHA`, `Utilities::RANDOM_TYPE_NUMERIC`
  * `onlyUppercase` *Optional* Whether the string contains only uppercase letters or not

```php
use Belt\Utilities;

Utilities::random(32);
```

<a name="development"></a>
## Development

<a name="development-plans"></a>
### Plans

+ Add `PHP 5.6` support - leverage **variadic functions**.

<a name="development-features"></a>
### Features

+ **Collections** [done]
  + each [done]
  + map [done]
  + reduce [done]
  + max [done]
  + min [done]
  + size [node]
  + toArray [done]
  + groupBy [done]
  + sortBy [done]
  + shuffle [done]
  + all [done]
  + any [done]
  + pluck [done]
  + contains [done]
  + invoke [done]
  + reject [done]
+ **Arrays** [done]
  + first [done]
  + initial [done]
  + rest [done]
  + last [done]
  + pack [done]
  + flatten [done]
  + without [done]
  + unique [done]
  + union [done]
  + difference [done]
  + zip [done]
  + intersection [done]
  + range [done]
  + indexOf [done]
+ **Functions** [done]
  + cache [done] 
  + once [done]
  + wrap [done]
  + after [done]
  + compose [done]
+ **Objects** [done]
  + keys [done]
  + values [done]
  + copy [done]
  + extend [done]
  + defaults [done]
  + methods [done]
  + apply [done]
  + has [done]
  + isEqual [done]
  + isEmpty [done]
  + isObject [done]
  + isArray [done]
  + isTraversable [done]
  + isFunction [done]
  + isString [done]
  + isNumber [done]
  + isBoolean [done]
  + isDate [done]
  + isNull [done]
+ **Utilities** [done]
  + with [done] 
  + times [done]
  + id [done]
  + random [done]
  + escape [done]
