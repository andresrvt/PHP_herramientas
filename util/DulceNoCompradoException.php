<?php
        declare(strict_types=1);
        namespace util;
        include_once("./autoload.php");
        include_once("PasteleriaException.php");
    
        class DulceNoCompradoException extends PasteleriaException{
            public function __construct(
                $message = "<br>Ya se ha comprado este dulce.<br>",
                $code = 2,
            )
            {
                parent::__construct($message,$code);
            }
    
            public function __toString(): string
            {
                return __CLASS__.": [{$this->code}]:{$this->message}\n";
            }
        }
?>