<?php

namespace App\Lib;

class FileLogger implements ILogger
{
    static protected $file_path;

    /**
     * [init description]
     * @param  [type] $file_path [description]
     * @return [type]            [description]
     */
    static public function init($file_path)
    {
        self::$file_path = $file_path;
    }

    /**
     * [write function to updated events.log file]
     * @param  [string] $event [description]
     * @return [string]        [description]
     */
    public function write($event)
    {
        $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

        $event = $event . "\n";

        flock(self::$file_path, LOCK_EX);

        fwrite(self::$file_path, $event, strlen($event));

        flock(self::$file_path, LOCK_UN);

        fclose(self::$file_path);
    }
}