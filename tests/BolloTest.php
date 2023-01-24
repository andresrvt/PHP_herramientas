<?php
namespace tests\Model;

include_once("./autoload.php");
use PHPUnit\Framework\TestCase;
use app\Bollo;

class BolloTest extends TestCase{
    public function testConstructor()
    {
        $bollo1 = new Bollo("bomba",1,2,"nata");
        $this->assertSame("nata", $bollo1->getRelleno());
    }
}

?>