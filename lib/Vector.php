<?php
 
/**
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 
/**
 * Description of List
 *
 * @author patrik
 */
class Vector
{
    /**
        * @var INTEGER constant
        */
    const INTEGER = "IntegerContainer";
    
    /**
         * @var STRING constant
         */
    const STRING = "StringContainer";
    
    /**
         * @var DOUBLE constant
         */
    const DOUBLE = "DoubleContainer";
    

    /**
     * Constructor factory, create a new list for specific data type
     *
     * @method __construct()
     * @param <type> $type
     * @return none
     */
    public static function createContainer($type)
    {
        if(is_object($type))
        {
            return new ObjectContainer(get_class($type));
        }else{
            if($type !== NULL)
            {
                return new $type;
            }else{
                throw new InvalidArgumentException('$type is invalid parameter');
            }
        }
    }

    /* Old version
    function  __call($name, $arguments)
    {
        if(method_exists($this->container, $name))
        {
            if(is_array($arguments))
            {
                return $this->container->$name($arguments[0]);
            }else{
                return $this->container->$name($arguments);
            }
        }else{
            throw new BadMethodCallException('$name is not callable');
        }
    }
    */
    /**
     * Get object container
     * 
     * @return <type>
     */
    /*
    public function getContainer()
    {
        return $this->container;
    }
    
    */
}
?>