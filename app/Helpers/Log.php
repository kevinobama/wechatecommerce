<?php
namespace App\Helpers;


class Log {

    public static function write($data, $isDelete = false, $file = '')
    {
        if(empty($file)) {
            $file = storage_path().'/logs/log.txt';
        }

        if (!file_exists($file)) {
            file_put_contents($file, null);
        }
        $currentData = file_get_contents($file);
        if ($isDelete) {
            $currentData = null;
        }
        if(is_array($data)) {
            $data = json_encode($data);
        }
        $currentData .= $data.PHP_EOL;

        file_put_contents($file, $currentData);
    }
    

    public static function read($file =null)
    {
        if(empty($file)) {
            $file = storage_path().'/logs/log.txt';
        }
        $currentData = file_get_contents($file);
        return file_get_contents($file, $currentData);
    }
}