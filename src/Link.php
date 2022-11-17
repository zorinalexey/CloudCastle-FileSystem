<?php

declare(strict_types = 1);

namespace CloudCastle\FileSystem;

/**
 * Класс Link
 * @version 0.0.1
 * @package CloudCastle\FileSystem
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class Link
{
    /**
     * Получить подробную информацию о ссылке
     * 
     * @param string $link Путь к ссылке
     * @return File Объект класса File заполненый информацией об указаной ссылке
     */
    public static function info(string $link): File
    {
        if(self::has($link)){
            return File::info($link);
        }
        return new File();
    }

     /**
     * Проверка наличия ссылки
     * 
     * @param string|null $link Путь до ссылке
     * @return bool Если ссылка найдена, то вернет true, иначе false
     */
    public static function has(?string $link = null): bool
    {
        if (File::info($link)->isLink) {
            return true;
        }
        return false;
    }
}