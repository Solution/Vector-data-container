<?php
 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 
require_once './lib/Vector.php';
require_once './lib/types/BaseContainer.php';
require_once './lib/types/IntegerContainer.php';

try{

$dict = Vector::createContainer(Vector::INTEGER);

for($i = 1; $i<=20; $i++)
{
    $dict->addItem($i*3);
}

print_r($dict->getItems(array(10,15)));

print $dict->sum().'<br />';

}catch(Exception $e)
{
    print $e->getMessage();
}


?>