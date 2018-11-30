<?php

declare(strict_types=1);

namespace Game;

interface LivingEntity
{
    public function isAlive(): bool;
}