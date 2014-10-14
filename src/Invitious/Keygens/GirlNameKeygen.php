<?php

namespace Invitious\Keygens;

use Invitious\KeygenAbstract;
use Invitious\KeygenInterface;

/**
 * GirlNameKeygen
 *
 * @author Jeroen Visser <jeroenvisser101@gmail.com>
 */
class GirlNameKeygen extends KeygenAbstract implements KeygenInterface
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        self::$wordList = (array) require __DIR__ . '/../data/girl_names.php';
    }
}
