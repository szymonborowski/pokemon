<?php

declare(strict_types=1);

/**
 * file: Pokemon.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Model;

use Szybo\Pokemon\Api\Data\PokemonInterface;

/**
 * Class Pokemon
 *
 * @package Szybo\Pokemon\Model
 */
class Pokemon implements PokemonInterface
{
    private int $id;
    private string $name;
    private string $imageUrl;

    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @inheritDoc
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @inheritDoc
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @inheritDoc
     */
    public function setImageUrl(string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }
}
