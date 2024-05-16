<?php

declare(strict_types=1);

/**
 * file: FrontendName.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\ValueObject\Pokemon\Ability;

use Assert\Assertion;
use Assert\AssertionFailedException;

/**
 * Class FrontendName
 *
 * @package Szybo\Pokemon\ValueObject\Pokemon\Ability
 */
readonly class FrontendName
{
    /**
     * @param  string  $value
     */
    private function __construct(
        private string $value
    ) {
    }

    /**
     * @param  string  $value
     *
     * @return self
     * @throws AssertionFailedException
     */
    public static function fromString(string $value): self
    {
        Assertion::notBlank($value, 'Pokemon ability frontend name cannot be empty');
        Assertion::maxLength($value, 60,
            'Pokemon ability name cannot be longer than 60 characters');

        return new self($value);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
