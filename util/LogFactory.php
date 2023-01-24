<?php

    namespace util;
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    include_once("./vendor/autoload.php");

    class LogFactory{
        public static function getLogger(string $canal = "miApp"):Logger{
            $log = new Logger($canal);
            $log->pushHandler(new StreamHandler("logs/miApp.log",Logger::DEBUG));

            return $log;
        }
    }
?>