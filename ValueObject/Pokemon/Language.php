<?php

declare(strict_types=1);

/**
 * file: Language.php
 *
 * @author Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\ValueObject\Pokemon;

use InvalidArgumentException;

/**
 * Class Language
 *
 * @package Szybo\Pokemon\ValueObject
 */
enum Language: string
{
    case EN = 'en';
    case DE = 'de';
    case FR = 'fr';
    case ES = 'es';
    case IT = 'it';
    case JA = 'ja';
    case UNDEFINED = 'undefined';

    /**
     * @param  string  $value
     *
     * @return self
     */
    public static function fromString(string $value): self
    {
        return match ($value) {
            'en' => self::EN,
            'de' => self::DE,
            'fr' => self::FR,
            'es' => self::ES,
            'it' => self::IT,
            'ja' => self::JA,
            default => self::UNDEFINED
        };
    }

    /**
     * @param  string  $value
     *
     * @return bool
     */
    public static function isAvailable(string $value): bool
    {
        return in_array($value, array_column(self::cases(), 'value'));
    }
}
