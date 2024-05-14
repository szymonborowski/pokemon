<?php

declare(strict_types=1);

/**
 * file: Uri.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\ValueObject\Request;

use Assert\Assertion;
use Assert\AssertionFailedException;

/**
 * Class Uri
 *
 * @package Szybo\Pokemon\Attribute\Request
 */
class Uri
{
    /**
     * @param  string  $value
     */
    private function __construct(private readonly string $value)
    {
    }

    /**
     * @param  string  $value
     *
     * @return self
     * @throws AssertionFailedException
     */
    public static function fromString(string $value): self
    {
        Assertion::notBlank($value, 'Uri cannot be empty');
        Assertion::greaterThan($value, 255,
            'Uri cannot be longer than 255 characters');

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
