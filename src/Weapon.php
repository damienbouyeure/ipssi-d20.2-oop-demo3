<?php

declare(strict_types=1);

namespace Game;

final class Weapon
{
    private $name;
    private $coefficient = 1.0;

    public function __construct(WeaponName $name, float $coefficient)
    {
        $this->name = $name;
        $this->coefficient = $coefficient;
    }

    public function name(): string
    {
        return $this->name->toString();
    }

    public function coefficient(): float
    {
        return $this->coefficient;
    }
}