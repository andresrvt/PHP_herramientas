<?php

    namespace util;
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    use Psr\Log\LoggerInterface;

    include_once("./vendor/autoload.php");

    class LogFactory{
        public static function getLogger(string $canal = "miApp"):LoggerInterface{
            $log = new Logger($canal);
            $log->pushHandler(new StreamHandler("logs/miApp.log",Logger::DEBUG));

            return $log;
        }
    }
?>