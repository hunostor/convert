<?php

/**
 * Created by PhpStorm.
 * User: poroszkaiattila
 * Date: 2017.07.21.
 * Time: 9:37
 */

use PHPUnit\Framework\TestCase;

class ConvertTest extends TestCase
{
    public function testTrue()
    {
        $this->assertTrue(true);
    }

    public function testSetString()
    {
        $convert = new \Convert\Convert;

        $convert->setString('string');

        $this->assertEquals($convert->string, 'string');
        $this->assertNotEquals($convert->string, '');
        $this->assertTrue(is_string($convert->string));
    }

    public function testActualCharLength()
    {
        $convert = new \Convert\Convert;
        $this->assertEquals(strlen($convert->setResultCharLength('12345')), 5);
        $this->assertEquals(strlen($convert->setResultCharLength('12345')), $convert->resultCharLength);
        $this->assertNotEquals(strlen($convert->setResultCharLength('12345678')), 8);
    }

    public function testStringConvertArray()
    {
        $convert = new \Convert\Convert;
        $array = $convert->stringConvertArray('valamilyen szoveg');

        $this->assertContains('v', $array);
        $this->assertContains('l', $array);
        $this->assertContains('y', $array);

        $array = $convert->stringConvertArray('Poroszkai Attila');

        $this->assertContains('P', $array);
        $this->assertContains(' ', $array);
        $this->assertContains('t', $array);
    }

    public function testCheckStringLength()
    {
        $convert = new \Convert\Convert;
        $length = $convert->checkStringLength('12345678');

        $this->assertEquals($length, 8);

        $length = $convert->checkStringLength('Poroszkai Attila');

        $this->assertEquals($length, 16);
    }

    public function testLengthCorrection()
    {
        $convert = new \Convert\Convert;
        $correctString = $convert->lengthCorrection('123');

        $this->assertEquals($correctString, '12312');

        $correctString = $convert->lengthCorrection('12');

        $this->assertEquals($correctString, '12121');

        $correctString = $convert->lengthCorrection('1');

        $this->assertEquals($correctString, '11111');
    }
}