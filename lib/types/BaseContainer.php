<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseContainer
 *
 * @author Solution
 */
abstract class BaseContainer implements Iterator
{
    /**
     * Position of pointer
     * 
     * @var integer
     */
    protected $position = 0;

    /**
     * Array container
     *
     * @var array
     */
    protected $data = array();

    /**
     * Length of array
     *
     * @var integer
     */
    protected $length = 0;

    /**
     * @method Rewind the pointer
     */
    function rewind()
    {
        if($this->position !== 0) --$this->position;
    }

    /**
     * @method Return current value
     * @return mixed
     */
    function current()
    {
        return $this->data[$this->position];
    }

    /**
     * @method Return position of pointer
     * @return integer
     */
    function key()
    {
        return $this->position;
    }

    /**
     * @method Move pointer to next value
     */
    function next()
    {
        ++$this->position;
    }

    /**
     *
     * @return boolean
     */
    function valid()
    {
        return $this->position < $this->length;
    }
    

}
?>
