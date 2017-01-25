<?php

require_once __DIR__ . '/../src/Table.php';

class TableTest extends \PHPUnit\Framework\TestCase{
    protected function setUp() {
        parent::setUp();
        $this->testTable = new Table(3, 4); 
    }
    protected function tearDown() {
        $this->testTable = null;
        parent::tearDown();
    }
    
    public function testGetNumberOfRows(){
        $this->assertEquals(3, $this->testTable->getNumberOfRows());
    }
    public function testGetNumberOfColumns(){
        $this->assertEquals(4, $this->testTable->getNumberOfColumns());
    }
    public function testGetValues(){
        $this->assertEmpty($this->testTable->getValues());
    }
    public function testRandomString(){
        $string = $this->testTable->randomString(2);
        $this->assertEquals(2, strlen($string));
        $this->assertRegExp('/^[a-zA-Z0-9]{2}$/', $string);
    }
    public function testAddRandomValues(){
        $this->testTable->addRandomValues();
        $array = $this->testTable->getValues();
        for ($i = 0; $i < $this->testTable->getNumberOfRows(); $i++) {
           
            for ($j = 0; $j < $this->testTable->getNumberOfColumns(); $j++) {
                $value = $array[$i][$j];
                $this->assertRegExp('/^[a-zA-Z0-9]{2}$/', $value);
            }
            
        }
    }
    public function testAddValues(){
        $array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
        $this->testTable->addValues($array);
        $values = $this->testTable->getValues();
        $this->assertEquals(1, $values[0][0]);
        $this->assertEquals(8, $values[1][3]);
        
    }
    public function testPrintValuesWithSnail(){
        $array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
        $this->testTable->addValues($array);
        $this->assertEquals('1, 2, 3, 4, 8, 12, 11, 10, 9, 5, 6, 7', 
                $this->testTable->printValuesWithSnail());
    }
}