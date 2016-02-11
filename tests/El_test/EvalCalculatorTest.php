<?php
namespace Stacmv\El_test;

require "vendor/autoload.php";

class EvalCalculatorTest extends \PHPUnit_Framework_TestCase
{
    protected $calc;
    
    protected function setUp()
    {
        $this->calc = new EvalCalculator;
    }
    
    public function testAdd(){
        
        $result = $this->calc->calculate("4+3"); // object of Result class
        
        
        $this->assertEquals(7, $result["res"]);
        
    }
    
    public function testSubtract(){
        
        $result = $this->calc->calculate("4-3"); // object of Result class        
        $this->assertEquals(1, $result["res"]);
        
    }
    
    public function testMultiply(){
        
        $result = $this->calc->calculate("4*3"); // object of Result class        
        $this->assertEquals(12, $result["res"]);
        
    }
    public function testDevide(){
        
        $result = $this->calc->calculate("120/8"); // object of Result class        
        $this->assertEquals(15, $result["res"]);
        
    }
    public function testDevideByZero(){
        
        $result = $this->calc->calculate("120/0"); // object of Result class
        $this->assertTrue( empty($result["res"]) && !empty($result["error"]) );
        
    }
    
    public function testWrongExpression(){
        
        $result = $this->calc->calculate("<script>alert(\"Yo\");</script>"); // object of Result class
        $this->assertTrue( empty($result["res"]) && !empty($result["error"]) );
        
    }
    public function testComplexExpression(){
        
        $result = $this->calc->calculate("4+5*23-45+4"); // object of Result class
        $this->assertEquals(78, $result["res"]);
        
    }
    public function testComplexExpressionWithParenthesis(){
        
        $result = $this->calc->calculate("(4+5)*23-45+4"); // object of Result class
        $this->assertEquals(166, $result["res"]);
        
    }
    public function testComplexExpressionWithParenthesises(){
    
        
        $result = $this->calc->calculate("(4+5)*23-(45+4)"); // object of Result class
        $this->assertEquals(158, $result["res"]);
        
    }
    public function testOneNumber(){
    
        
        $result = $this->calc->calculate("2345"); // object of Result class
        $this->assertEquals(2345, $result["res"]);
        
    }
    public function testNegativeNumber(){
    
        
        $result = $this->calc->calculate("-2345"); // object of Result class
        $this->assertEquals(-2345, $result["res"]);
        
    }
    public function testFloatNumber(){
    
        
        $result = $this->calc->calculate("23.45"); // object of Result class
        $this->assertEquals(23.45, $result["res"]);
        
    }
    public function testComplexExpressionWidthLeadingNegation(){
    
        
        $result = $this->calc->calculate("-23.45*3+443"); // object of Result class
        $this->assertEquals(372.65, $result["res"]);
        
    }
    public function testMultiplyByZero(){
    
        
        $result = $this->calc->calculate("-23.45*0"); // object of Result class
        $this->assertEquals(0, $result["res"]);
        
    }
    
    
    
    
    
}