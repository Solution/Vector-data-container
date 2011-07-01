<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IntegerContainer
 *
 * @author Solution
 */
class IntegerContainer extends BaseContainer
{

    function __construct()
    {
        //
    }

    public function addItem($item)
    {
        if(is_int($item))
        {
            $this->data[] = $item;
            ++$this->length;
        }else{
            throw new InvalidArgumentException('$item is not integer');
        }
    }

    public function remove($offset)
    {
        if(!is_array($offset))
        {
            if(isset($this->data[$offset]))
            {
                unset($this->data[$offset]);
                --$this->length;
                $this->refreshKeys();
            }else{
                throw new OutOfRangeException('$offset is out of range');
            }
        }else{
            if($offset[0] < $this->getLength() && $offset[1] <= $this->getLength())
            {
                for((int)$i = $offset[0]; $i<=$offset[1]; $i++)
                {
                    unset($this->data[$i]);
                    --$this->length;
                }
                $this->refreshKeys();
            }else{
                throw new OutOfRangeException('$offset are out of range');
            }
        }
    }

    public function getItem($id)
    {
        if($id < $this->length)
        {
            return $this->data[$id];
        }else{
            throw new OutOfRangeException('$id is out of range');
        }
    }

    public function getItems($offset)
    {
        if($offset !== NULL)
        {
            if($offset[0] < $this->getLength() && $offset[1] <= $this->getLength())
            {
                $returned = array();
                $j = 0;
                for((int)$i = $offset[0]; $i<=$offset[1]; $i++)
                {
                    $returned[++$j] = $this->getItem($i);
                }
              return $returned;
            }else{
                throw new OutOfRangeException('$offset are out of range');
            }
        }else{
            return $this->data;
        }
    }

    public function getLength()
    {
        return $this->length;
    }

    public function sum()
    {
        $val = 0;
        foreach($this->data as $key => $value)
        {
            $val = $val + $value;
        }
      return $val;
    }

    private function refreshKeys()
    {
        $i = 0;
        foreach($this->data as $key => $value)
        {
            $this->data[++$i] = $value;
        }
    }
}
?>
