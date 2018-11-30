<?php

declare(strict_types=1);

namespace Game;

/**
 *  Création de mon zombie avec des hp et des dégats
 */
class Zombie extends Character implements MortalCharacter
{
    public function __construct($id)
    {
        parent::__construct($id);
    }

    public function takeDamage(float $damage): void
    {
        if ($damage >= $this->health) {
            throw new CharacterIsDead($this);
        }
        $this->health -= $damage;
    }

    public function describeItsDeath(): string
    {
        return "{$this->name()} is dead again!";
    }
}