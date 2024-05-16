<?php

declare(strict_types=1);

/**
 * file: PokemonDataModifierInterface.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Api\Data;

/**
 * Interface PokemonDataModifierInterface
 *
 * @package Szybo\Pokemon\Api\Data
 */
interface PokemonDataModifierInterface
{
    /**
     * @param  PokemonInterface  $pokemon
     *
     * @return void
     */
    public function modify(PokemonInterface $pokemon): void;
}
