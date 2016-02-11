<?php
namespace Stacmv\El_test;

interface CalculatorInterface
{
    /*
        @return \Stacmv\El_test\Result
    */
    
    public function calculate($expression);
}