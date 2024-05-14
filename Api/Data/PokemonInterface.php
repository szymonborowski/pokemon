<?php

declare(strict_types=1);

/**
 * file: PokemonInterface.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Api\Data;

/**
 * Interface PokemonInterface
 *
 * @package Szybo\Pokemon\Api\Data
 */
interface PokemonInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getImageUrl(): string;

    /**
     * @param  int  $id
     *
     * @return void
     */
    public function setId(int $id): void;

    /**
     * @param  string  $name
     *
     * @return void
     */
    public function setName(string $name): void;

    /**
     * @param  string  $imageUrl
     *
     * @return void
     */
    public function setImageUrl(string $imageUrl): void;
}
