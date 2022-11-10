<?php

declare(strict_types = 1);

namespace Unit\CloudCastle\Tests\FileSystem;

use stdClass;
use CloudCastle\FileSystem\File;
use PHPUnit\Framework\TestCase;

/**
 * Класс FileTest
 * @version 0.0.1
 * @package \FileTest
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class FileTest extends TestCase
{

    public function testCheckhas()
    {
        $fileObj = new File();
        $test1 = $fileObj->has(__FILE__);
        $this->assertTrue($test1);
        $test2 = $fileObj->has(__DIR__);
        $this->assertFalse($test2);
    }

    public function testCheckFile()
    {
        $message = 'test';
        $fileObj = new File();
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'test.txt';
        $test1 = $fileObj->create($file);
        $this->assertTrue($test1);
        $test2 = $fileObj->create($file);
        $this->assertFalse($test2);
        $test3 = $fileObj->permissions($file, 0777);
        $this->assertTrue($test3);
        $test4 = $fileObj->read($file);
        $this->assertEquals(null, $test4);
        $this->assertNotEquals($message, $test4);
        $test5 = $fileObj->add($file, $message);
        $this->assertTrue($test5);
        $test6 = $fileObj->read($file);
        $this->assertEquals($message, $test6);
        $this->assertNotEquals(null, $test6);
        $info = $fileObj->info($file);
        $this->assertInstanceOf(File::class, $info);
        $this->assertNotInstanceOf(stdClass::class, $info);
        $test7 = $fileObj->rewrite($file, $message);
        $this->assertTrue($test7);
        $test8 = $fileObj->delete($file);
        $this->assertTrue($test8);
        $test9 = $fileObj->delete($file);
        $this->assertFalse($test9);
        $test10 = $fileObj->permissions($file, 0777);
        $this->assertFalse($test10);
        $test11 = $fileObj->read($file);
        $this->assertEquals(null, $test11);
        $test12 = $fileObj->rewrite($file, $message);
        $this->assertFalse($test12);
    }

}
