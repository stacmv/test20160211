<?php
namespace Stacmv\El_test;

class Result implements \ArrayAccess, \JsonSerializable
{
    const DATE_FORMAT = "d.m.Y H:i:s";
    
    private $dt;
    private $expression;
    private $res;
    private $error;
    
    
    public function __construct($expression, $res, $error = "")
    {
        $this->expression = $expression;
        $this->res        = $res;
        $this->error      = $error;
        $this->dt         = date(self::DATE_FORMAT);
    }
    
    public function __get($key){
        if (in_array($key, array("dt", "expression", "res", "error"))){
            return $this->$key;
        };
    }
    
    public function offsetExists ( $offset )
    {
        return isset( $this->$offset );
    }
    public function offsetGet ( $offset )
    {
        if ($this->offsetExists($offset)){
            return $this->__get($offset);
        }else{
            return false;
        }
    }
    public function offsetSet ( $offset, $value )
    {
        // not implemented
    }
    public function offsetUnset ( $offset )
    {
        // not implemented
    }
    
    public function jsonSerialize(){
        $arr =  array(
            "dt" => $this->dt,
            "expression" => $this->expression,
        );
        
        if (!empty($this->error)){
            $arr["error"] = $this->error;
        };
        
        if (is_numeric($this->res)){
            $arr["res"] = $this->res;
        };
        
        return $arr;
    }
}
