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
    /** @var $list <DataType>Object */
    private $list;

    /**
     * Constructor factory, create a new list for specific data type
     *
     * @method __construct()
     * @param <type> $type
     * @return none
     */
    function __construct($type)
    {
        if(is_object($type))
        {
            $this->list = new ObjectContainer(get_class($type));
        }else{
            if($type !== NULL)
            {
                $ctype = sprintf("%sContainer",$type);
                $this->container = new $ctype;
            }else{
                throw new InvalidArgumentException('$type is invalid parameter');
            }
        }
    }

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
    
    /**
     * Get object container
     * 
     * @return <type>
     */
    public function getContainer()
    {
        return $this->container;
    }
}
?>