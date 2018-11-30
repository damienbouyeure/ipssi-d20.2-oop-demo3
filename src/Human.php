<?php

declare(strict_types=1);

namespace Game;

use LogicException;

/**
 *    Création de mon humain avec des hp et des dégats
 */
final class Human extends Character implements MortalCharacter
{
    private $weapon;

    public function __construct($id, Weapon ...$weapons)
    {
        parent::__construct($id);
        $this->weapon = $this->weaponFactory(...$weapons);
    }

    private function weaponFactory(Weapon ...$weapons): Weapon
    {
        $randomWeaponIndex = rand(0, count($weapons) - 1);

        if (!isset($weapons[$randomWeaponIndex])) {
            throw new LogicException("Weapon $randomWeaponIndex not found");
        }

        return $weapons[$randomWeaponIndex];
    }

    public function takeDamage(float $damage): void
    {
        if ($damage >= $this->health) {
            throw new CharacterIsDead($this);
        }
        $this->health -= $damage;
    }

    public function force(): float
    {
        return $this->weapon->coefficient() * parent::force();
    }

    public function describeItsDeath(): string
    {
        return "{$this->name()} is dead for the first time";
    }
}