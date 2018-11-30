<?php

declare(strict_types=1);

namespace Game;

final class NameValidator
{
    public const MIN_LENGTH = 2;

    public static function validateName(string $value): bool
    {
        return strlen($value) < self::MIN_LENGTH;
    }
}