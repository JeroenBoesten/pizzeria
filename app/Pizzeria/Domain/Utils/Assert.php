<?php

namespace App\Pizzeria\Domain\Utils;

use InvalidArgumentException;

class Assert
{
    private function __construct() {}

    /**
     * @phpstan-assert !null $value
     */
    public static function notNull(mixed $value, string $property): void
    {
        if (null === $value) {
            throw new InvalidArgumentException("Property `{$property}` cannot be null");
        }
    }

    /**
     * @phpstan-assert null|string $value
     */
    public static function isStringOrNull(mixed $value, string $property): void
    {
        if (null !== $value && !is_string($value)) {
            throw new InvalidArgumentException("Property `{$property}` must be a string");
        }
    }
}
