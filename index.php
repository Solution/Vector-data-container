<?php
 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 
require_once './lib/Vector.php';
require_once './lib/types/BaseContainer.php';
require_once './lib/types/IntegerContainer.php';

try{

$dict = new Vector('Integer');

for($i = 1; $i<=20; $i++)
{
    $dict->addItem($i*3);
}

print_r($dict->getItems(array(10,15)));

#$dict->add('ada');

print $dict->sum().'<br />';

$dict->remove(array(10,15)).'<br />';
print $dict->getLength();
print_r($dict->getItems());
}catch(Exception $e)
{
    print $e->getMessage();
}


?>