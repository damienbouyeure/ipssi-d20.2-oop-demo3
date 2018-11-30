<?php

declare(strict_types=1);

namespace Game;


interface Player extends Fighter, Opponent, LivingEntity, Identifiable
{
}