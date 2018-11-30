<?php

declare(strict_types=1);

namespace Game;

use RuntimeException;

final class CharacterIsDead extends RuntimeException
{
    private $character;

    public function __construct(MortalCharacter $character)
    {
        parent::__construct("{$character->describeItsDeath()}\n");
        $this->character = $character;
    }

    public function impactedMortalCharacter(): MortalCharacter
    {
        return $this->character;
    }
}