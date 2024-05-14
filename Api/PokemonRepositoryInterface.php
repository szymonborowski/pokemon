<?php

declare(strict_types=1);

/**
 * file: PokemonRepositoryInterface.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Api;

use Szybo\Pokemon\Api\Data\PokemonInterface;

/**
 * Interface PokemonRepositoryInterface
 *
 * @package Szybo\Pokemon\Api
 */
interface PokemonRepositoryInterface
{
    /**
     * @param  string  $name
     *
     * @return PokemonInterface
     */
    public function getByName(string $name): PokemonInterface;
}
