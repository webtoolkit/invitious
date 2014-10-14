<?php

namespace Invitious\Keygens;

use Invitious\KeygenAbstract;
use Invitious\KeygenInterface;

/**
 * EnglishWordKeygen
 *
 * @author Jeroen Visser <jeroenvisser101@gmail.com>
 */
class EnglishWordKeygen extends KeygenAbstract implements KeygenInterface
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        self::$wordList = (array) require __DIR__ . '/../data/english_words.php';
    }
}
