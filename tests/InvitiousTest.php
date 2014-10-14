<?php

use Invitious\Invitious;

class InvitiousTest extends PHPUnit_Framework_TestCase
{
    public function testIfInvitiousReturnsACode()
    {
        $code = Invitious::generate(Invitious::ENGLISH_WORD_GENERATOR);

        $this->assertRegExp('/[a-z\-]+/i', $code, 'Code does not match regex');
    }

    public function testGirlNameCode()
    {
        $code = Invitious::generate(Invitious::GIRL_NAME_GENERATOR);

        $this->assertRegExp('/[a-z\-]+/i', $code, 'Code does not match regex');
    }

    public function testBoyNameCode()
    {
        $code = Invitious::generate(Invitious::BOY_NAME_GENERATOR);

        $this->assertRegExp('/[a-z\-]+/i', $code, 'Code does not match regex');
    }

    public function testSalt()
    {
        $code = Invitious::generate(Invitious::ENGLISH_WORD_GENERATOR, 3, '-', 'hello_world', '3');

        echo $code;

        $this->assertRegExp('/[a-z\-]+[a-f0-9]{3}/i', $code, 'Code does not contain salt');
    }
}
