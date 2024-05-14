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
use Szybo\Pokemon\Api\Data\ActionInterface;
use Szybo\Pokemon\Api\Data\ActionInterfaceFactory;
use Szybo\Pokemon\Api\Data\PokemonInterface;
use Szybo\Pokemon\Api\Data\PokemonInterfaceFactory;
use Szybo\Pokemon\Api\PokemonRepositoryInterface;
use Szybo\Pokemon\ValueObject\Request\Method;
use Szybo\Pokemon\ValueObject\Request\Uri;
use Szybo\Pokemon\ValueObject\Request\Param;

/**
 * Class PokemonRepository
 *
 * @package Szybo\Pokemon\Service
 */
class PokemonRepository implements PokemonRepositoryInterface
{
    public function __construct(
        private readonly ActionInterfaceFactory $actionFactory,
        private readonly PokemonMapper $pokemonMapper,
        private readonly PokemonApiConnector $pokemonApiConnector,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function getByName(string $name): PokemonInterface
    {
        try {
            $action = $this->actionFactory->create();
            $action->setMethod(Method::GET);
            $action->setUri(Uri::fromString('pokemon/:name'));
            $action->addParam(Param::fromString('name', $name));

            return $this->pokemonMapper->map($this->pokemonApiConnector->request($action));
        } catch (AssertionFailedException $e) {
            throw new LocalizedException(__($e->getMessage()));
        }
    }
}
