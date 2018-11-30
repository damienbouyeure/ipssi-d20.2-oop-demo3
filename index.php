<?php

use Game\Battle;
use Game\Human;
use Game\Weapon;
use Game\WeaponName;
use Game\Zombie;

require __DIR__.'/vendor/autoload.php';

$tofuBox = new Weapon(new WeaponName('boite de tofu'), 2.0);

$fight = new Battle(...[
    new Human(1, ...[$tofuBox]),
    new Human(2, ...[$tofuBox]),
    new Human(3, ...[$tofuBox]),
    new Human(4, ...[$tofuBox]),
    new Human(5, ...[$tofuBox]),
    new Zombie(1),
    new Zombie(2),
    new Zombie(3),
    new Zombie(4),
    new Zombie(5),
    new Zombie(6),
    new Zombie(7),
]);

$fight->fight();
