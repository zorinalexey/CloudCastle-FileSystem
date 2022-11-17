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
     * Проверка наличия дирректории
     * 
     * @param string|null $link Путь до ссылке
     * @return bool Если ссылке найдена, то вернет true, иначе false
     */
    public static function has(?string $link = null): bool
    {
        if ($link) {
            return is_link($link);
        }
        return false;
    }
}