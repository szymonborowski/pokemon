<?php

declare(strict_types=1);

/**
 * file: PokemonDetails.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Szybo\Pokemon\Service\PokemonRepository;
use Szybo\Pokemon\ViewModel\Pokemon as PokemonViewModel;

/**
 * Class PokemonDetails
 *
 * @package Szybo\Pokemon\Controller\Pokemon
 */
class PokemonDetails extends Template
{
    /**
     * @param  PokemonViewModel  $pokemonViewModel
     * @param  PokemonRepository  $pokemonRepository
     * @param  Context  $context
     * @param  string  $template
     * @param  array  $data
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function __construct(
        private readonly PokemonViewModel $pokemonViewModel,
        private readonly PokemonRepository $pokemonRepository,
        Context $context,
        string $template = 'Szybo_Pokemon::pokemon-details.phtml',
        array $data = [],
    )
    {
        $this->setTemplate($template);
        parent::__construct($context, $data);

        $pokemon = $this->pokemonRepository->getByName($this->getPokemonId());

        if ($pokemon) {
            $this->pokemonViewModel->setPokemon($pokemon);
        }
    }

    /**
     * @return string
     */
    public function getPokemonId(): string
    {
        return (string)$this->getData('pokemon_id');
    }

    /**
     * @return PokemonViewModel
     */
    public function getPokemonViewModel(): PokemonViewModel
    {
        return $this->pokemonViewModel;
    }
}
