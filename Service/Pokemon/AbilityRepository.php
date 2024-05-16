<?php

declare(strict_types=1);

/**
 * file: AbilityRepository.php
 *
 * @author Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Service\Pokemon;

use Assert\AssertionFailedException;
use Magento\Framework\Exception\LocalizedException;
use Szybo\Pokemon\Api\Data\ActionInterfaceFactory;
use Szybo\Pokemon\Api\Data\Pokemon\AbilityInterface;
use Szybo\Pokemon\Api\Pokemon\AbilityRepositoryInterface;
use Szybo\Pokemon\Model\Pokemon\Collection\AbilityCollection;
use Szybo\Pokemon\Service\PokemonApiConnector;
use Szybo\Pokemon\ValueObject\Request\Method;
use Szybo\Pokemon\ValueObject\Request\Param;
use Szybo\Pokemon\ValueObject\Request\Uri;

/**
 * Class AbilityRepository
 *
 * @package Szybo\Pokemon\Service\Pokemon
 */
class AbilityRepository implements AbilityRepositoryInterface
{
    public function __construct(
        private PokemonApiConnector $pokemonApiConnector,
        private AbilityMapper $pokemonAbilityMapper,
        private ActionInterfaceFactory $actionFactory
    ) {
    }


    /**
     * @inheritDoc
     */
    public function getByName(string $name): ?AbilityInterface
    {
        $pokemonAbilityData = [];

        try {
            $action = $this->actionFactory->create();
            $action->setUri(Uri::fromString('ability/:name'));
            $action->addParam(Param::fromString('name', $name));

            $pokemonAbilityData = $this->pokemonApiConnector->request($action);
        } catch (AssertionFailedException $e) {
            throw new LocalizedException(__($e->getMessage()));
        }

        return $this->pokemonAbilityMapper->map($pokemonAbilityData);
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): ?AbilityInterface
    {
        return $this->getByName((string) $id);
    }
}
