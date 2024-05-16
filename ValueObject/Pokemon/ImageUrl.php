<?php

declare(strict_types=1);

/**
 * file.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\ValueObject\Pokemon;

use Assert\Assertion;
use Assert\InvalidArgumentException;

/**
 * Class ImageUrl
 *
 * @package Szybo\Pokemon\Attribute\Request
 */
readonly class ImageUrl
{
    /**
     * @param  string  $value
     */
    private function __construct(
        private string $value
    ) {
    }

    /**
     * @param  string|null  $value
     *
     * @return self
     * @throws InvalidArgumentException
     */
    public static function fromString(?string $value): self
    {
        Assertion::nullOrUrl($value, 'Pokemon image URL is not a valid URL');

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
