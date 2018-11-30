<?php

declare(strict_types=1);

namespace Game;

interface Identifiable
{
    public function identifier(): string;
}