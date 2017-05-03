<?php
/**
 * |-----------------------------------------------------------------------------
 * | AutoLoad Class
 * |-----------------------------------------------------------------------------
 * | Author bluelife
 * | Email thebulelife@outlook.com
 * | Date 2016-12-16
 * |-----------------------------------------------------------------------------
 */

spl_autoload_register('Autoloader::autoload');

class Autoloader
{
    private static $autoload_list = array(
        '.',
        'Adinall',
        'BaiDuBES',
        'MiaoZhen',
        'Tanx',
        'ValueMake',
    );

    public static function autoload($className)
    {
        foreach (self::$autoload_list as $path) {
            $file = __DIR__ . ($path == './' || $path == '.' ? '' : DIRECTORY_SEPARATOR . $path) . DIRECTORY_SEPARATOR . $className . '.php';
            $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
            if (is_file($file)) {
                include_once $file;
                echo 'loadered ' . $file . PHP_EOL;
                break;
            }
        }
    }

    public static function addAutoloadPath($path)
    {
        array_push(self::$autoload_list, $path);
    }
}

