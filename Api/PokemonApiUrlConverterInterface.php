<?php

declare(strict_types=1);

/**
 * file: PokemonApiUrlConverterInterface.php
 *
 * @package Szybo\Pokemon\Api
 * @author Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Api;

use Szybo\Pokemon\Api\Data\ActionInterface;

interface PokemonApiUrlConverterInterface
{
    /**
     * @param  string  $url
     *
     * @return ActionInterface
     */
    public function execute(string $url): ActionInterface;
}
