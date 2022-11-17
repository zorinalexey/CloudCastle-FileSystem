<?php

declare(strict_types = 1);

namespace CloudCastle\FileSystem;

use \stdClass;

/**
 * Класс Json
 * @version 0.0.1
 * @package  CloudCastle\FileSystem
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class Json
{

    /**
     * Получить объект из json файла
     * 
     * @param string $jsonFile Путь к json файлу
     * @return stdClass Объект сформированый в результате декодирования содержимого json файла
     */
    public static function read(string $jsonFile): stdClass
    {
        $data = new stdClass;
        if (File::has($jsonFile)) {
            $info = File::info($jsonFile);
            if ($info->extension === 'json' AND $data = File::read($jsonFile)) {
                $data = json_decode($data);
            }
        }
        return $data;
    }

    /**
     * Создать новый json файл
     * 
     * @param string $jsonFile Путь к json файлу
     * @param mixed $data Данные которые необходимо конвертирорвать в json и записать в файл
     * @return bool В случае успеха вернет true, иначе false
     */
    public static function create(string $jsonFile, $data): bool
    {
        $content = false;
        if (is_object($data) OR is_array($data)) {
            $content = self::toString($data);
        }
        if ( ! File::has($jsonFile) AND $content) {
            return File::create($jsonFile, $content);
        }
        return false;
    }

    /**
     * Перезаписать json файл
     * 
     * @param string $jsonFile Путь к json файлу
     * @param mixed $data Данные которые необходимо конвертирорвать в json и записать в файл
     * @return bool В случае успеха вернет true, иначе false
     */
    public static function rewrite(string $jsonFile, $data = false): bool
    {
        if (is_array($data) OR is_object($data)) {
            if (File::has($jsonFile) AND $data AND File::delete($jsonFile)) {
                return self::create($jsonFile, $data);
            }
        }
        return self::create($jsonFile, $data);
    }

    /**
     * Удалить json файл
     * 
     * @param string $jsonFile  Путь к json файлу
     * @return bool В случае успеха вернет true, иначе false
     */
    public static function delete(string $jsonFile): bool
    {
        if (self::has($jsonFile)) {
            return File::delete($jsonFile);
        }
        return false;
    }

    /**
     * Проверить является ли файл json файлом
     * 
     * @param string $jsonFile  Путь к json файлу
     * @return bool В случае успеха вернет true, иначе false
     */
    public static function has(string $jsonFile): bool
    {
        $info = File::info($jsonFile);
        if ($info->extension === 'json') {
            return true;
        }
        return false;
    }

    /**
     * Сформировать строку json из массива или объекта
     * 
     * @param mixed $data Массив или объект
     * @param int $format Набор констант применяемых к json_encode
     * @return string|false Строка json отформатированая в соответствии с $format
     */
    public static function toString($data, int $format = JSON_PRETTY_PRINT)
    {
        if (is_array($data) OR is_object($data)) {
            return json_encode($data, $format);
        }
        return false;
    }

}
