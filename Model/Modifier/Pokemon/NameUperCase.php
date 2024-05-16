<?php

declare(strict_types=1);

/**
 * file: NameUperCase.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Model\Modifier\Pokemon;

use Szybo\Pokemon\Api\Data\PokemonDataModifierInterface;
use Szybo\Pokemon\Api\Data\PokemonInterface;
use Szybo\Pokemon\ValueObject\Pokemon\Name;

/**
 * Class NameUperCase
 *
 * @package Szybo\Pokemon\Model\Pokemon\Modifier
 */
class NameUperCase implements PokemonDataModifierInterface
{
    /**
     * @inheirtDoc
     */
    public function modify(PokemonInterface $pokemon): void
    {
        if ($pokemon->getName()) {
            $pokemonName = ucwords((string)$pokemon->getName());
            try {
                $pokemon->setName(Name::fromString($pokemonName));
            } catch (\Exception $e) {
            }
        }
    }
}
