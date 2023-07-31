<?php

require_once __DIR__ . '/consts.php';

class Logger {

    public static function addToLog($message) {
        date_default_timezone_set(TIMEZONE);
        $currentTime = date('Y-m-d H:i:s');
        $path = __DIR__ . "/logs/log.log";
        error_log("$currentTime: $message\n", 3, $path);
    }

    public static function addToErrorsLog($message) {
        date_default_timezone_set(TIMEZONE);
        $currentTime = date('Y-m-d H:i:s');
        $path = __DIR__ . "/logs/errors.log";
        error_log("$currentTime: $message\n", 3, $path);
    }
}
