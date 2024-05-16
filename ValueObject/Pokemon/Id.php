<?php

declare(strict_types=1);

/**
 * file: Id.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\ValueObject\Pokemon;

use Assert\Assertion;
use Assert\AssertionFailedException;

/**
 * Class Id
 *
 * @package Szybo\Pokemon\ValueObject\Pokemon
 */
readonly class Id
{
    /**
     * @param  int  $value
     */
    private function __construct(
        private int $value
    ) {
    }

    /**
     * @param  int  $value
     *
     * @return self
     * @throws AssertionFailedException
     */
    public static function fromInt(int $value): self
    {
        Assertion::notBlank($value, 'Pokemon id cannot be empty');
        Assertion::greaterThan($value, 0,'Pokemon id expected to be positive integer');

        return new self($value);
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->value;
    }
}
