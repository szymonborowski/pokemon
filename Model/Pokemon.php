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
use Szybo\Pokemon\Api\Request\ParamCollectionInterface;
use Szybo\Pokemon\Model\Pokemon\Collection\AbilityCollection;
use Szybo\Pokemon\ValueObject\Pokemon\BaseExperience;
use Szybo\Pokemon\ValueObject\Pokemon\Height;
use Szybo\Pokemon\ValueObject\Pokemon\Id;
use Szybo\Pokemon\ValueObject\Pokemon\ImageUrl;
use Szybo\Pokemon\ValueObject\Pokemon\Name;
use Szybo\Pokemon\ValueObject\Pokemon\Weight;

/**
 * Class Pokemon
 *
 * @package Szybo\Pokemon\Model
 */
class Pokemon implements PokemonInterface
{
    private Id $id;
    private Name $name;
    private ImageUrl $imageUrl;
    private Weight $weight;
    private Height $height;
    private BaseExperience $baseExperience;
    private ParamCollectionInterface $abilities;

    /**
     * @inheritDoc
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function getImageUrl(): ImageUrl
    {
        return $this->imageUrl;
    }

    /**
     * @inheritDoc
     */
    public function getWeight(): Weight
    {
        return  $this->weight;
    }

    /**
     * @inheritDoc
     */
    public function getHeight(): Height
    {
        return  $this->height;
    }

    /**
     * @inheritDoc
     */
    public function getBaseExperience(): BaseExperience
    {
        return $this->baseExperience;
    }

    /**
     * @inheritDoc
     */
    public function setId(Id $id): void
    {
        $this->id = $id;
    }

    /**
     * @inheritDoc
     */
    public function setName(Name $name): void
    {
        $this->name = $name;
    }

    /**
     * @inheritDoc
     */
    public function setImageUrl(ImageUrl $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @inheritDoc
     */
    public function setWeight(Weight $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @inheritDoc
     */
    public function setHeight(Height $height): void
    {
        $this->height = $height;
    }

    /**
     * @inheritDoc
     */
    public function setBaseExperience(BaseExperience $baseExperience): void
    {
        $this->baseExperience = $baseExperience;
    }

    /**
     * @inheritDoc
     */
    public function getAbilities(): ParamCollectionInterface
    {
        return $this->abilities;
    }

    /**
     * @inheritDoc
     */
    public function setAbilities(ParamCollectionInterface $abilities): void
    {
        $this->abilities = $abilities;
    }
}
