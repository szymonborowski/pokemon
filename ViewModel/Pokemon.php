<?php

declare(strict_types=1);

/**
 * file: Pokemon.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\ViewModel;

use Exception;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Psr\Log\LoggerInterface;
use Szybo\Pokemon\Api\Data\PokemonInterface;
use Szybo\Pokemon\Api\Pokemon\AbilityCollectionInterface;
use Szybo\Pokemon\Api\Pokemon\AbilityCollectionInterfaceFactory;
use Szybo\Pokemon\Service\Pokemon\AbilityRepository;

/**
 * Class Pokemon
 *
 * @package Szybo\Pokemon\ViewModel
 */
class Pokemon implements ArgumentInterface
{
    private PokemonInterface $pokemon ;

    /**
     * @param  AbilityRepository  $abilityRepository
     * @param  AbilityCollectionInterfaceFactory  $abilityCollectionFactory
     * @param  LoggerInterface  $logger
     */
    public function __construct(
        private readonly AbilityRepository $abilityRepository,
        private readonly AbilityCollectionInterfaceFactory $abilityCollectionFactory,
        private readonly LoggerInterface $logger,
    ) {
    }

    /**
     * @param  PokemonInterface  $pokemon
     *
     * @return void
     */
    public function setPokemon(PokemonInterface $pokemon): void
    {
        $this->pokemon = $pokemon;
    }

    /**
     * @return PokemonInterface|null
     */
    public function getPokemon(): ?PokemonInterface
    {
        return $this->pokemon;
    }

    /**
     * @return AbilityCollectionInterface
     */
    public function getAbilities(): AbilityCollectionInterface
    {
        $abilities = $this->abilityCollectionFactory->create();
        $list = $this->pokemon->getAbilities();

        try {
            foreach ($list as $param) {;
                $abilities[] = $this->abilityRepository->getByName((string)$param);
            }
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
        }

        return $abilities;
    }
}
