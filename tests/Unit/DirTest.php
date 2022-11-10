<?php

declare(strict_types = 1);

namespace Unit\CloudCastle\Tests\FileSystem;

use CloudCastle\FileSystem\Dir;
use CloudCastle\FileSystem\File;
use PHPUnit\Framework\TestCase;

/**
 * Класс DirTest
 * @version 0.0.1
 * @package \DirTest
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class DirTest extends TestCase
{

    public function testCheckhas()
    {
        $dirObj = new Dir();
        $dir1 = $dirObj->has(null);
        $this->assertFalse($dir1);
        $dir2 = $dirObj->has(__DIR__);
        $this->assertTrue($dir2);
    }

    public function testCheckCreate()
    {
        $dirObj = new Dir();
        $dir1 = $dirObj->create(null);
        $this->assertFalse($dir1);
        $dir2 = $dirObj->create(__DIR__);
        $this->assertTrue($dir2);
    }

    public function testCheckPermissions()
    {
        $dirObj = new Dir();
        $dir1 = $dirObj->permissions(__DIR__, 0777);
        $this->assertTrue($dir1);
        $dir2 = $dirObj->permissions(__DIR__ . DIRECTORY_SEPARATOR . 'test', 0777);
        $this->assertFalse($dir2);
    }

    public function testCheckDeleteFalse()
    {
        $newDir = __DIR__ . DIRECTORY_SEPARATOR . 'test' . DIRECTORY_SEPARATOR . 'test';
        $dirObj = new Dir();
        $resultDir = false;
        if ($dirObj->create($newDir, 0777, true)) {
            $resultDir = $dirObj->delete(dirname($newDir));
        }
        $this->assertFalse($resultDir);
    }

    public function testCheckDeleteTrue()
    {
        $newDir = __DIR__ . DIRECTORY_SEPARATOR . 'test' . DIRECTORY_SEPARATOR . 'test';
        $dirObj = new Dir();
        $resultDir = false;
        if ($dirObj->create($newDir, 0777)) {
            $resultDir = $dirObj->delete(dirname($newDir), true);
        }
        $this->assertTrue($resultDir);
    }

    public function testCheckScan()
    {
        $dirObj = new Dir();
        $files = $dirObj->scan(__DIR__);
        $this->assertIsArray($files);
        $this->assertArrayHasKey(0, $files);
        $files2 = $dirObj->scan(__DIR__ . DIRECTORY_SEPARATOR . 'test');
        $this->assertArrayNotHasKey(0, $files2);
    }

    public function testCheckInfo()
    {
        $dirObj = new Dir();
        $info = $dirObj->info(__DIR__);
        $this->assertInstanceOf(File::class, $info);
    }

}
