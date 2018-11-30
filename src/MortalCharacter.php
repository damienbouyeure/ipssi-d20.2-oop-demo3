<?php

declare(strict_types=1);

namespace Game;

interface MortalCharacter extends Identifiable
{
    public function describeItsDeath(): string;
}