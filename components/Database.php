<?php

class Database
{
    private static $delay = 5;
    private static $maxDelay = 360;
    private static $paramsPath = 'config/db_params.php';
    private static $params;

    public static function getConnection()
    {
        self::$params = include(self::$paramsPath);
        $db = mysqli_connect(self::$params['host'], self::$params['user'], self::$params['password'], self::$params['dbname']);

        while (self::$delay < self::$maxDelay) {
            if (!$db) {
                echo self::$delay;
                sleep(self::$delay);
                self::$delay *= 2;
                self::getConnection();
            } else {
                return $db;
            }
        }
    }
}
