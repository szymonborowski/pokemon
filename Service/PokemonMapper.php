<?php

declare(strict_types=1);

/**
 * file: PokemonMapper.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Service;

use Szybo\Pokemon\Api\Data\PokemonInterface;
use Szybo\Pokemon\Api\Data\PokemonInterfaceFactory;

/**
 * Class PokemonMapper
 *
 * @package Szybo\Pokemon\Service
 */
class PokemonMapper
{
    /**
     * @param  PokemonInterfaceFactory  $pokemonFactory
     */
    public function __construct(private PokemonInterfaceFactory $pokemonFactory)
    {
    }

    /**
     * @param  array  $data
     *
     * @return PokemonInterface
     */
    public function map(array $data): PokemonInterface
    {
        $pokemon = $this->pokemonFactory->create();
        $pokemon->setId($data['id'] ?: null);
        $pokemon->setName($data['name'] ?: null);
        $pokemon->setImageUrl($data['sprites']['other']['official-artwork']['front_default'] ?: null);

        return $pokemon;
    }
}
