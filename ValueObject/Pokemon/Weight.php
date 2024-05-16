<?php

declare(strict_types=1);

/**
 * file: Weight.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\ValueObject\Pokemon;

use Assert\Assertion;
use Assert\AssertionFailedException;

/**
 * Class Weight
 *
 * @package Szybo\Pokemon\Attribute\Request
 */
readonly class Weight
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
        Assertion::greaterThan($value, 0,'Pokemon height expected to be grater than 0');

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
