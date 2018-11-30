<?php

declare(strict_types=1);

namespace Game;

use InvalidArgumentException;

final class WeaponName
{
    private $value;

    public function __construct(string $value)
    {
        $value = trim($value);
        if (NameValidator::validateName($value)) {
            throw new InvalidArgumentException(sprintf(
                'A weapon name must be at least %d character long, %d given (%s)',
                NameValidator::MIN_LENGTH,
                strlen($value),
                $value
            ));
        }
        $this->value = $value;
    }

    public function toString(): string
    {
        return $this->value;
    }
}