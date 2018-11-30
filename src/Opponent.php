<?php

declare(strict_types=1);

namespace Game;

interface Opponent
{
    public function takeDamage(float $damage);
    public function health(): float;
}