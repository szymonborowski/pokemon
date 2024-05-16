<?php

declare(strict_types=1);

/**
 * file: PokemonDetailsTab.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Block;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Szybo\Pokemon\Model\Config\SystemConfigProvider;

/**
 * Class PokemonDetailsTab
 *
 * @package Szybo\Pokemon\Controller\Pokemon
 */
class PokemonDetailsTab extends Template
{
    /**
     * @param  SystemConfigProvider  $configProvider
     * @param  Registry  $registry
     * @param  Context  $context
     * @param  array  $data
     */
    public function __construct(
        private readonly SystemConfigProvider $configProvider,
        private readonly Registry $registry,
        Context $context,
        array $data = [],
    )
    {
        parent::__construct($context, $data);
    }

    /**
     * @return bool
     */
    public function isPokemonApiEnabled(): bool
    {
        return $this->configProvider->getEnable();
    }

    /**
     * @return string|null
     */
    public function getPokemonName(): ?string
    {
        $product = $this->registry->registry('current_product');

        return $product?->getData('pokemon_name');
    }
}
