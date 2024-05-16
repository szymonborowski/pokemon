<?php

declare(strict_types=1);

/**
 * file: PokemonInterface.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Api\Data;

use Szybo\Pokemon\Api\Request\ParamCollectionInterface;
use Szybo\Pokemon\Model\Pokemon\Collection\AbilityCollection;
use Szybo\Pokemon\ValueObject\Pokemon\BaseExperience;
use Szybo\Pokemon\ValueObject\Pokemon\Height;
use Szybo\Pokemon\ValueObject\Pokemon\Id;
use Szybo\Pokemon\ValueObject\Pokemon\Name;
use Szybo\Pokemon\ValueObject\Pokemon\ImageUrl;
use Szybo\Pokemon\ValueObject\Pokemon\Resource;
use Szybo\Pokemon\ValueObject\Pokemon\Weight;

/**
 * Interface PokemonInterface
 *
 * @package Szybo\Pokemon\Api\Data
 */
interface PokemonInterface
{
    /**
     * @return Id
     */
    public function getId(): Id;

    /**
     * @return Name
     */
    public function getName(): Name;

    /**
     * @return Weight
     */
    public function getWeight(): Weight;

    /**
     * @return Height
     */
    public function getHeight(): Height;

    /**
     * @return ImageUrl
     */
    public function getImageUrl(): ImageUrl;

    /**
     * @return BaseExperience
     */
    public function getBaseExperience(): BaseExperience;

    /**
     * @return ParamCollectionInterface
     */
    public function getAbilities(): ParamCollectionInterface;

    /**
     * @param  Id  $id
     *
     * @return void
     */
    public function setId(Id $id): void;

    /**
     * @param  Name  $name
     *
     * @return void
     */
    public function setName(Name $name): void;

    /**
     * @param  Weight  $weight
     *
     * @return void
     */
    public function setWeight(Weight $weight): void;

    /**
     * @param  Height  $height
     *
     * @return void
     */
    public function setHeight(Height $height): void;

    /**
     * @param  ImageUrl  $imageUrl
     *
     * @return void
     */
    public function setImageUrl(ImageUrl $imageUrl): void;

    /**
     * @param  BaseExperience  $baseExperience
     *
     * @return void
     */
    public function setBaseExperience(BaseExperience $baseExperience): void;

    /**
     * @param  ParamCollectionInterface  $abilities
     *
     * @return void
     */
    public function setAbilities(ParamCollectionInterface $abilities): void;
}
