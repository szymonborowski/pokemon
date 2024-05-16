<?php

declare(strict_types=1);

/**
 * file: PokemonRepositoryInterface.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Api\Pokemon;

use Szybo\Pokemon\Api\Data\Pokemon\AbilityInterface;

/**
 * Interface PokemonRepositoryInterface
 *
 * @package Szybo\Pokemon\Api
 */
interface AbilityRepositoryInterface
{
    /**
     * @param  string  $name
     *
     * @return AbilityInterface|null
     */
    public function getByName(string $name): ?AbilityInterface;

    /**
     * @param  int  $id
     *
     * @return AbilityInterface|null
     */
    public function getById(int $id): ?AbilityInterface;
}
