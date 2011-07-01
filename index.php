<?php
 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 
require_once './lib/Vector.php';
require_once './lib/types/BaseContainer.php';
require_once './lib/types/IntegerContainer.php';

function tuhleFci($a)
{
    print "Jedeme";
}
function tahleFci($a)
{
    print "Nejedeme:-D";
}

try{

# Create a data container
$dict = Vector::createContainer(Vector::INTEGER);

# Handle events, which is call when input item crossed limit
$dict->onInputCross[500] = 'tuhleFci';
$dict->onInputCross[750] = 'tahleFci';

# Add some values
for($i = 1; $i<=20; $i++)
{
    $dict->addItem($i*3);
}

$dict->addItem(550);
$dict->addItem(770);

}catch(Exception $e)
{
    print $e->getMessage();
}


?>