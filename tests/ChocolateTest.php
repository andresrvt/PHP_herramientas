<?php
namespace tests\Model;

include_once("./autoload.php");
use PHPUnit\Framework\TestCase;
use app\Chocolate;

class ChocolateTest extends TestCase{
    public function testConstructor()
    {
        $choco1 = new Chocolate("Nestle", 16, 3,72,3.15); 
        $this->assertSame(72, $choco1->getPorcentajeCacao());
    }
}

?>