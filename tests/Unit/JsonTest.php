<?php

declare(strict_types = 1);

namespace Unit\CloudCastle\Tests\FileSystem;

use stdClass;
use CloudCastle\FileSystem\Json;
use CloudCastle\FileSystem\Dir;
use PHPUnit\Framework\TestCase;

/**
 * Класс JsonTest
 * @version 0.0.1
 * @package \JsonTest
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class JsonTest extends TestCase
{

    public function testJson()
    {
        $data = new stdClass();
        $obj = new Json();
        $jsonFile = __DIR__ . DIRECTORY_SEPARATOR . 'json' . DIRECTORY_SEPARATOR . 'test.json';
        $test1 = $obj->create($jsonFile, $data);
        $this->assertTrue($test1);
        $test2 = $obj->create($jsonFile, 'test');
        $this->assertFalse($test2);
        $test3 = $obj->rewrite($jsonFile, $data);
        $this->assertTrue($test3);
        $test4 = $obj->rewrite($jsonFile, 'tets');
        $this->assertFalse($test4);
        $test5 = $obj->has($jsonFile);
        $this->assertTrue($test5);
        $test6 = $obj->has(__FILE__);
        $this->assertFalse($test6);
        $test7 = $obj->read($jsonFile);
        $this->assertInstanceOf(stdClass::class, $test7);
        $test8 = $obj->delete($jsonFile);
        Dir::delete(dirname($jsonFile));
        $this->assertTrue($test8);
        $test9 = $obj->delete(__FILE__);
        $this->assertFalse($test9);
    }

}
