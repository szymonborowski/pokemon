<?php

declare(strict_types=1);

/**
 * file: PokemonRepositoryPlugin.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Plugin;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Exception\LocalizedException;
use Szybo\Pokemon\Service\PokemonRepository;

/**
 * Class PokemonRepositoryPlugin
 *
 * @package Szybo\Pokemon\Plugin
 */
readonly class ProductPlugin
{
    public function __construct(
        private PokemonRepository $repository
    ) {
    }

    /**
     * This plugin is responsible for dynamically changing the product name to the Pokemon name.
     *
     * @param  ProductInterface  $subject
     * @param  ProductInterface  $result
     *
     * @return ProductInterface
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @throws LocalizedException
     */
    public function afterLoad(
        ProductInterface $subject,
        ProductInterface $result
    ): ProductInterface {
        $pokemonName = $result->getData('pokemon_name');

        if (!$pokemonName) {
            return $result;
        }

        $pokemon = $this->repository->getByName($pokemonName);

        if ($pokemon && $pokemon->getName()) {
            $result->setName((string)$pokemon->getName());
        }

        return $result;
    }
}
