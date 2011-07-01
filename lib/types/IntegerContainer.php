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

    /**
         * Handle event when sum() is crossed
         * @var type 
         */
    public $onSumCross = array();
    
    /**
         * Handle event when input value crossed the limit
         * @var type
         */
    public $onInputCross = array();
    
    /**
         * Sum of the container
         * @var type 
         */
    private $summary = 0;
    
    
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
            $this->sum();
            
            if(count($this->onInputCross) !== 0)
            {
                $limits = array_keys($this->onInputCross);
                krsort($limits);
                
                foreach($limits as $limit)
                {
                    if($item >= $limit)
                    {
                        call_user_func($this->onInputCross[$limit], $item);
                        break;
                    }
                }
                
            }
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
        $this->summary = $val;
      return $val;
    }

    private function refreshKeys()
    {
        $i = 0;
        foreach($this->data as $key => $value)
        {
            $this->data[++$i] = $value;
        }
      $this->sum();         
    }
}
?>
