<?php

declare(strict_types=1);

/**
 * file: PokemonRepository.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Service;

use Assert\AssertionFailedException;
use Magento\Framework\Exception\LocalizedException;
use Szybo\Pokemon\Api\Data\ActionInterfaceFactory;
use Szybo\Pokemon\Api\Data\PokemonInterface;
use Szybo\Pokemon\Api\PokemonRepositoryInterface;
use Szybo\Pokemon\Service\Pokemon\AbilityMapper;
use Szybo\Pokemon\Service\Pokemon\AbilityRepository;
use Szybo\Pokemon\ValueObject\Request\Action;
use Szybo\Pokemon\ValueObject\Request\Method;
use Szybo\Pokemon\ValueObject\Request\Param;
use Szybo\Pokemon\ValueObject\Request\Uri;

/**
 * Class PokemonRepository
 *
 * @package Szybo\Pokemon\Service
 */
readonly class PokemonRepository implements PokemonRepositoryInterface
{
    /**
     * @param  ActionInterfaceFactory  $actionFactory
     * @param  PokemonMapper  $pokemonMapper
     * @param  PokemonApiConnector  $pokemonApiConnector
     */
    public function __construct(
        private ActionInterfaceFactory $actionFactory,
        private PokemonMapper $pokemonMapper,
        private PokemonApiConnector $pokemonApiConnector,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function getByName(string $name): ?PokemonInterface
    {
        $pokemonData = [];

        try {
            $action = $this->actionFactory->create();
            $action->setUri(Uri::fromString('pokemon/:name'));
            $action->addParam(Param::fromString('name', $name));

            $pokemonData = $this->pokemonApiConnector->request($action);
            $pokemon = $this->pokemonMapper->map($pokemonData);
        } catch (AssertionFailedException $e) {
            throw new LocalizedException(__($e->getMessage()));
        }

        return $pokemon;
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): ?PokemonInterface
    {
        return $this->getByName((string)$id);
    }
}
