<?php

namespace Invitious;

/**
 * KeygenAbstract
 *
 * @author Jeroen Visser <jeroenvisser101@gmail.com>
 */
abstract class KeygenAbstract implements KeygenInterface
{
    /**
     * @var array
     */
    protected static $wordList = array();

    /**
     * Generates a invitation code.
     *
     * @param int    $count     Amount of words that has to be created
     * @param string $delimiter The word delimiter, defaulted to a dash
     *
     * @return string
     */
    public function generate($count, $delimiter = '-')
    {
        // If there are no words
        if ($count <= 0) {
            throw new \InvalidArgumentException("Given count is equal or lower than zero, {$count} given.");
        }

        // Initiate some variables, make sure we know how much words we have
        $maxWordIndex = count(static::$wordList) - 1;
        $code = '';

        for ($i = $count; $i >= 1; $i--) {
            $code .= static::$wordList[mt_rand(0, $maxWordIndex)] . $delimiter;
        }

        // Remove chars that we don't want in our code
        $code = preg_replace('/[^a-z\-]+/i', null, $code);

        // Trim the excess delimiters
        $code = trim($code, $delimiter);

        // Lower all the words
        $code = strtolower($code);

        return $code;
    }
}
