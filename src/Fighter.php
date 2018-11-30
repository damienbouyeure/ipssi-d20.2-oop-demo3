<?php

declare(strict_types=1);

namespace Game;

interface Fighter
{
    public function damage(): float;
    public function force(): float;

}