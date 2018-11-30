<?php

declare(strict_types=1);

namespace Game;

abstract class Character implements MortalCharacter, LivingEntity, Player
{
    protected $health = 0.0;
    protected $damage = 0.0;
    protected $force = 1.0;
    private $id;

    public function __construct($id)
    {
        $this->health = (float)rand(75, 100);
        $this->damage = (float)rand(10, 20);
        $this->force = 1.0;
        $this->id = $id;
    }

    public function health(): float
    {
        return $this->health;
    }

    abstract public function takeDamage(float $damage): void;

    public function name(): string
    {
        $val = explode('\\', get_class($this));
        return $val[count($val) - 1];
    }

    public function damage(): float
    {
        return $this->damage;
    }

    public function force(): float
    {
        return $this->force;
    }

    public function isAlive(): bool
    {
        return $this->health > 0;
    }

    public function identifier(): string
    {
        return (string) $this->id;
    }
}