<?php

namespace App\Services;

use App\Exceptions\StorageException;

class Storage
{
    private static $instance;

    private static string $storage_path = 'public/storage';

    private function __construct()
    {
        $dirnames = explode('/', self::getStoragePath());

        $path = $_SERVER['DOCUMENT_ROOT'];

        foreach ($dirnames as $dirname) {
            $path = $path . '/' . $dirname;

            if (!is_dir($path)) {
                mkdir($path);
            }
        }
    }

    public static function getInstance()
    {
        if (self::$instance instanceof self) {
            return self::$instance;
        }

        return self::$instance = new self;
    }

    public static function getStoragePath(): string
    {
        return self::$storage_path;
    }

    public static function generateFileName(string $filename): string
    {
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        return uniqid() . '.' . $extension;
    }

    public static function filePath(string $filename): string
    {
        return self::getStoragePath() . '/' . self::generateFileName($filename);
    }

    public static function save(array $file): string
    {
        try {
            $file_path = $file['tmp_name'];
            $storage_path = self::filePath($file['name']);

            if (move_uploaded_file($file_path, $storage_path)) {
                return $storage_path;
            }
        } catch (StorageException $e) {
            throw new StorageException('Произошла ошибка во время загрузки файла.');
        }
    }

    public static function url(string $filepath)
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/' . $filepath;
    }
}
