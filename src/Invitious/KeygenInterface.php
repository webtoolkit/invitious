<?php

namespace Invitious;

/**
 * KeygenInterface
 *
 * @author Jeroen Visser <jeroenvisser101@gmail.com>
 */
interface KeygenInterface
{
    /**
     * Generates a invitation code
     *
     * @param int    $count     Amount of words that has to be created
     * @param string $delimiter The delimiter for the words
     *
     * @return string
     */
    public function generate($count, $delimiter = '-');
}
