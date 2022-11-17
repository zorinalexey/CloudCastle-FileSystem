<?php

declare(strict_types = 1);

namespace CloudCastle\FileSystem;

/**
 * Класс FileSystem
 * @version 0.0.1
 * @package CloudCastle\FileSystem
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class FileSystem
{

    /**
     * Объект для работы с файлами
     *
     * @var File|null
     */

    public ?File $file;

    /**
     * Объект для работы с папками
     *
     * @var Dir|null
     */
    public ?Dir $dir;

    /**
     * Объект для работы с json файлами
     *
     * @var Json|null
     */
    public ?Json $json;

    /**
     * Объект для работы с сылками
     *
     * @var Link|null
     */
    public ?Link $link;

    /**
     * Коллекция объектов класса
     *
     * @var array
     */
    protected static array $obj = [];

    /**
     * Конструктор класса
     */
    private function __construct()
    {
        $this->dir = new Dir();
        $this->file = new File();
        $this->json = new Json();
        $this->link = new Link();
    }

    /**
     * Получить текущий объект текущего класса
     * 
     * @return $this
     */
    public static function instance(): self
    {
        $class = get_called_class();
        if ( ! isset(self::$obj[$class])) {
            self::$obj[$class] = new self();
        }
        return self::$obj[$class];
    }

}
