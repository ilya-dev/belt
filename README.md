# Belt

[![Build Status](https://travis-ci.org/ilya-dev/belt.svg?branch=master)](https://travis-ci.org/ilya-dev/belt)

A handful of tools for PHP developers.

## Installation

In case you want to try it out:


`composer require ilya/belt:1.0.0`

## Example

A little taste of Belt:

```php

Belt::max([1, 2, 3]) // => 3

Belt::flatten([1, [2, [3]]]) // => [1, 2, 3]

Belt::last([1, 2, 3], 2) // => [2, 3]

```

## What It Offers

+ **60+** useful functions
+ ability to use the facade `Belt` or a dedicated component (e.g. `Belt\Utilities`)
+ fully tested
+ source code is clean and documented

Here is what is available to you:

+ `boolean isDate(mixed $value)`
+ `boolean isNumber(mixed $value)`
+ `boolean isString(mixed $value)`
+ `boolean isNumber(mixed $value)`
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
+ `mixed tap(mixed $object, Closure $closure)`
+ `mixed defaults(mixed $object, array|mixed $defaults)`
+ `string escape(string $string)`
+ `string id(string $prefix = '')`
+ `mixed with(mixed $value)`
+ `void times(integer $number, Closure $closure)`
+ `mixed cache(Closure $closure)`
+ `mixed wrap(Closure $closure, Closure $wrapper)`
+ `mixed compose(array $closures, array $arguments = array())`
+ `void once(Closure $closure)`
+ `mixed after(integer $number, Closure $closure)`
+ `mixed|array first(array $elements, integer $amount = 1)`
+ `array initial(array $elements, integer $amount = 1)`
+ `array rest(array $elements, integer $index = 1)`
+ `mixed|array last(array $elements, integer $amount = 1)`
+ `array pack(array $elements)`
+ `array flatten(array $elements)`
+ `array range(integer $to, integer $from = 0, integer $step = 1)`
+ `array difference(array $one, array $another)`
+ `array unique(array $elements, Closure $iterator = null)`
+ `array without(array $elements, array $ignore)`
+ `array zip(array $one, array $another)`
+ `integer indexOf(array $elements, mixed $element)`
+ `array intersection(array $one, array $another)`
+ `array union(array $one, array $another)`
+ `void each(array $collection, Closure $iterator)`
+ `array map(array $collection, Closure $iterator)`
+ `array toArray(mixed $value)`
+ `integer|null size(array|Countable $value)`
+ `array shuffle(array $collection)`
+ `boolean any(array $collection, Closure $iterator)`
+ `boolean all(array $collection, Closure $iterator)`
+ `array reject(array $collection, Closure $iterator)`
+ `array filter(array $collection, Closure $iterator)`
+ `array pluck(array $collection, string $key)`
+ `boolean contains(array $collection, mixed $value)`
+ `array invoke(array $collection, string $function)`
+ `mixed reduce(array $collection, Closure $iterator, mixed $initial = 0)`
+ `array sortBy(array $collection, Closure $iterator)`
+ `array groupBy(array $collection, Closure $iterator)`
+ `mixed max(array $collection)`
+ `mixed min(array $collection)`

## Development

### Plans

+ add support for `PHP 5.6` - leverage *arguments unpacking* and *variadic functions*
+ some refactoring is in order

### Features

+ **Collections** [done]
  + each [done]
  + map [done]
  + filter [done]
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
  + tap [done]
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
  + escape [done]

## License

Belt is licensed under the MIT license.

