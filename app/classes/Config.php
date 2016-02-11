<?php
namespace Stacmv;

class Config implements \ArrayAccess
{
    private $CFG = null;
    
    public function __construct($ini_file_name)
    {
        if (file_exists($ini_file_name)){
            $this->CFG = parse_ini_file($ini_file_name);
        }
    }
    
    public function offsetExists ( $offset )
    {
        return isset( $this->CFG[$offset] );
    }
    public function offsetGet ( $offset )
    {
        if ($this->offsetExists($offset)){
            return $this->CFG[$offset];
        }else{
            return false;
        }
    }
    public function offsetSet ( $offset, $value )
    {
        $this->CFG[$offset] = $value;
    }
    public function offsetUnset ( $offset )
    {
        if ($this->offsetExists($offset)){
            unset($this->CFG[$offset]);
        };
    }
    
}
