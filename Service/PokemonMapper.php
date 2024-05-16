<?php

declare(strict_types=1);

/**
 * file: PokemonMapper.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Service;

use Assert\AssertionFailedException;
use Szybo\Pokemon\Api\Data\ActionInterface;
use Szybo\Pokemon\Api\Data\PokemonDataModifierInterface;
use Szybo\Pokemon\Api\Data\PokemonInterface;
use Szybo\Pokemon\Api\Data\PokemonInterfaceFactory;
use Szybo\Pokemon\Api\PokemonApiUrlConverterInterface;
use Szybo\Pokemon\Api\Request\ParamCollectionInterface;
use Szybo\Pokemon\Api\Request\ParamCollectionInterfaceFactory;
use Szybo\Pokemon\ValueObject\Pokemon\Height;
use Szybo\Pokemon\ValueObject\Pokemon\Id;
use Szybo\Pokemon\ValueObject\Pokemon\ImageUrl;
use Szybo\Pokemon\ValueObject\Pokemon\Name;
use Szybo\Pokemon\ValueObject\Pokemon\Weight;
use Szybo\Pokemon\ValueObject\Request\Param;

/**
 * Class PokemonMapper
 *
 * @package Szybo\Pokemon\Service
 */
readonly class PokemonMapper
{
    /**
     * @param  PokemonInterfaceFactory  $pokemonFactory
     * @param  PokemonApiUrlConverterInterface  $pokemonApiUrlConverter
     * @param  ParamCollectionInterfaceFactory  $paramCollectionFactory
     * @param  array  $modifiers
     */
    public function __construct(
        private PokemonInterfaceFactory $pokemonFactory,
        private PokemonApiUrlConverterInterface $pokemonApiUrlConverter,
        private ParamCollectionInterfaceFactory $paramCollectionFactory,
        private array $modifiers = [],
    ) {
    }

    /**
     * @param  array  $data
     *
     * @return PokemonInterface|null
     */
    public function map(array $data): ?PokemonInterface
    {
        try {
            $pokemon = $this->pokemonFactory->create();
            $id = Id::fromInt($data['id'] ?: null);
            $pokemon->setId($id);
            $name = Name::fromString($data['name'] ?: null);
            $pokemon->setName($name);
            $width = Weight::fromInt($data['weight'] ?: null);
            $pokemon->setWeight($width);
            $height = Height::fromInt($data['height'] ?: null);
            $pokemon->setHeight($height);
            $imageUrl = ImageUrl::fromString($data['sprites']['other']['official-artwork']['front_default'] ?: null);
            $pokemon->setImageUrl($imageUrl);

            $abilitiesCollection = $this->getAbilitiesList($data['abilities'] ?? []);

            $pokemon->setAbilities($abilitiesCollection);

            $this->applyModifiers($pokemon);

        } catch (AssertionFailedException $e) {
            $pokemon = null;
        }

        return $pokemon;
    }

    /**
     * @param  PokemonInterface  $pokemon
     *
     * @return void
     */
    private function applyModifiers(PokemonInterface $pokemon): void
    {
        foreach ($this->modifiers as $modifier) {
            if (!($modifier instanceof PokemonDataModifierInterface)) {
                throw new \InvalidArgumentException('Pokemon data modifier must be an instance of PokemonDataModifierInterface');
            }

            $modifier->modify($pokemon);
        }
    }

    /**
     * @param  array  $abilities
     *
     * @return ParamCollectionInterface
     */
    private function getAbilitiesList(array $abilities): ParamCollectionInterface
    {
        $paramCollection = $this->paramCollectionFactory->create();

        foreach ($abilities as $ability) {
            if (!isset($ability['ability']['name'])) {
                continue;
            }

            $params = $this->pokemonApiUrlConverter->execute($ability['ability']['url'])?->getParams();
            $idParam = $params['id'] ?? null;

            if (!($idParam instanceof Param)) {
                continue;
            }

            $paramCollection[] = $idParam;
        }

        return $paramCollection;
    }
}
