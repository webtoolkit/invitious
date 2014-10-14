# Invitious: Invitation Code Generator
This library creates invitation codes like [Ello.co](http://ello.co/) does. Something like `at-tight-level-96e` or `swim-continent-main-d9e`.

## API
``` php
<?php
Invitious::generate(
  $type = self::ENGLISH_WORD_GENERATOR,
  $count = 3,
  $delimiter = '-',
  $salt = null,
  $saltLength = 3
)
```

Whereas:
 - `$type` is the type of words, which can be:
  - `Invitious::ENGLISH_WORD_GENERATOR` (default)
  - `Invitious::BOY_NAME_GENERATOR`
  - `Invitious::GIRL_NAME_GENERATOR`
 - `$count` is the amount of words that are to be generated.
 - `$delimiter` is the string that separates the words.
 - `$salt` is a string which will be used to salt the unique key.
 - `$saltLenght` the amount of characters of the unique key that should be added.

## Example
``` php
<?php
use Invitious\Invitious;

// Basic code
echo Invitious::generate(Invitious::ENGLISH_WORD_GENERATOR);

// Custom length
echo Invitious::generate(Invitious::ENGLISH_WORD_GENERATOR, 4);

// Custom separator
echo Invitious::generate(Invitious::ENGLISH_WORD_GENERATOR, 4, '_');

// With a key
echo Invitious::generate(Invitious::ENGLISH_WORD_GENERATOR, 4, '_', 'hello');

// With a custom key length
echo Invitious::generate(Invitious::ENGLISH_WORD_GENERATOR, 4, '_', 'hello', 10);
```
