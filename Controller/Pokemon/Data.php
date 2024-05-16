<?php

declare(strict_types=1);

/**
 * file: PokemonData.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Controller\Pokemon;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\LayoutFactory;
use Szybo\Pokemon\Block\PokemonDetails;

/**
 * Class PokemonData
 * @package Szybo\Pokemon\Controller\Ajax
 */
class Data extends Action
{
    /**
     * @param  RawFactory  $resultRawFactory
     * @param  LayoutFactory  $layoutFactory
     * @param  Context  $context
     */
    public function __construct(
        private readonly RawFactory $resultRawFactory,
        private readonly LayoutFactory $layoutFactory,
        Context $context,
    ) {
        parent::__construct($context);
    }

    /**
     * @return ResultInterface
     */
    public function execute()
    {
        $resultRaw = $this->resultRawFactory->create();
        $pokemonId = (string)$this->getRequest()->getParam('id');

        if (empty($pokemonId)) {
            return $resultRaw;
        }

        $layout = $this->layoutFactory->create();
        $block = $layout->createBlock(
            PokemonDetails::class,
            'pokemon.details',
            [
                'data' => ['pokemon_id' => $pokemonId],
            ]
        );

        $html = $block->toHtml();
        $resultRaw->setContents($html);

        return $resultRaw;
    }
}
