<?php

declare(strict_types=1);

/**
 * file: Param.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\ValueObject\Request;

use Assert\Assertion;
use Assert\AssertionFailedException;

/**
 * Class Param
 *
 * @package Szybo\Pokemon\Attribute\Request
 */
class Param
{
    /**
     * @param  string  $name
     * @param  string  $value
     */
    private function __construct(
        private readonly string $name,
        private readonly string $value
    ) {
    }

    /**
     * @param  string  $name
     * @param  string  $value
     *
     * @return self
     * @throws AssertionFailedException
     */
    public static function fromString(string $name, string $value): self
    {
        Assertion::notBlank($name, 'Param name cannot be empty');
        Assertion::greaterThan($name, 60,
            'Param name cannot be longer than 60 characters');

        Assertion::notBlank($value, 'Param cannot be empty');
        Assertion::greaterThan($value, 60,
            'Param cannot be longer than 60 characters');

        return new self($name, $value);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
