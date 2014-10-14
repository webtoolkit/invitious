<?php

namespace Invitious;

use Invitious\Keygens\BoyNameKeygen;
use Invitious\Keygens\EnglishWordKeygen;
use Invitious\Keygens\GirlNameKeygen;

/**
 * Keygen Factory
 *
 * @author Jeroen Visser <jeroenvisser101@gmail.com>
 */
class Invitious
{
    /**
     * Types
     */
    const ENGLISH_WORD_GENERATOR = 'english_words';
    const GIRL_NAME_GENERATOR    = 'girl_name';
    const BOY_NAME_GENERATOR     = 'boy_name';

    /**
     * Generates a random code.
     *
     * @param string $type       The type of Invitation code Generator should be returned.
     * @param int    $count      The amount of words that have to generated
     * @param string $delimiter  Used to separate the words.
     * @param string $salt       A salt used to salt the digits behind the word-code
     * @param int    $saltLength Amount of characters to use as salt
     *
     * @return string
     */
    public static function generate($type = self::ENGLISH_WORD_GENERATOR, $count = 3, $delimiter = '-', $salt = null, $saltLength = 3)
    {
        /** @var KeygenInterface $keygen */
        $keygen = null;
        $key = '';

        $type = (string) $type;

        // Choose the type of keygen that is wanted
        switch ($type) {
            case static::GIRL_NAME_GENERATOR:
                $keygen = new GirlNameKeygen();
                break;

            case static::BOY_NAME_GENERATOR:
                $keygen = new BoyNameKeygen();
                break;

            default:
            case static::ENGLISH_WORD_GENERATOR:
                $keygen = new EnglishWordKeygen();
                break;
        }

        // Check if the type is correct and contains the generate function
        if (!$keygen instanceof KeygenInterface) {
            throw new \InvalidArgumentException("'$type' is not a valid type.");
        }

        // Create the key
        if ($salt && $saltLength > 0) {
            $key .= $delimiter;
            $key .= substr(sha1($salt . mt_rand(0, 9999999) . microtime(true)), 0, $saltLength);
        }

        return $keygen->generate((int) $count, (string) $delimiter) . $key;
    }
}
