<?php

namespace Invitious\Keygens;

use Invitious\KeygenAbstract;
use Invitious\KeygenInterface;

/**
 * BoyNameKeygen
 *
 * @author Jeroen Visser <jeroenvisser101@gmail.com>
 */
class BoyNameKeygen extends KeygenAbstract implements KeygenInterface
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        self::$wordList = (array) require __DIR__ . '/../data/boy_names.php';
    }
}
