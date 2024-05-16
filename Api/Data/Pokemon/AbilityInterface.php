<?php

declare(strict_types=1);

/**
 * file: PokemonInterface.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Api\Data\Pokemon;

use Szybo\Pokemon\ValueObject\Pokemon\Ability\Description;
use Szybo\Pokemon\ValueObject\Pokemon\Ability\Id;
use Szybo\Pokemon\ValueObject\Pokemon\Ability\Name;
use Szybo\Pokemon\ValueObject\Pokemon\Ability\FrontendName;

/**
 * Interface PokemonInterface
 *
 * @package Szybo\Pokemon\Api\Data
 */
interface AbilityInterface
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
     * @return Description
     */
    public function getDescription(): Description;

    /**
     * @return FrontendName
     */
    public function getFrontendName(): FrontendName;

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
     * @param  Description  $description
     *
     * @return void
     */
    public function setDescription(Description $description): void;

    /**
     * @param  FrontendName  $frontendName
     *
     * @return void
     */
    public function setFrontendName(FrontendName $frontendName): void;
}
