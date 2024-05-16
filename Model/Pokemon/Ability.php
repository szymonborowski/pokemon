<?php

declare(strict_types=1);

/**
 * file: Ability.php
 *
 * @author Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Model\Pokemon;

use Szybo\Pokemon\Api\Data\Pokemon\AbilityInterface;
use Szybo\Pokemon\ValueObject\Pokemon\Ability\Description;
use Szybo\Pokemon\ValueObject\Pokemon\Ability\FrontendName;
use Szybo\Pokemon\ValueObject\Pokemon\Ability\Id;
use Szybo\Pokemon\ValueObject\Pokemon\Ability\Name;

/**
 * Class Ability
 *
 * @package Szybo\Pokemon\Model\Pokemon
 */
class Ability implements AbilityInterface
{
    private Id $id;
    private Name $name;
    private Description $description;

    private FrontendName $frontendName;

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
    public function getDescription(): Description
    {
        return $this->description;
    }

    /**
     * @inheritDoc
     */
    public function getFrontendName(): FrontendName
    {
        return $this->frontendName;
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
    public function setDescription(Description $description): void
    {
        $this->description = $description;
    }

    /**
     * @inheritDoc
     */
    public function setFrontendName(FrontendName $frontendName): void
    {
        $this->frontendName = $frontendName;
    }
}
