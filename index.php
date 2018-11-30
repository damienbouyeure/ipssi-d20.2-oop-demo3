<?php

require("class.php");

$Humain = new Humain;
$Zombie = new Zombie;
$fight = new fight;

$fight->fightHumVSZom($Humain, $Zombie);

?>