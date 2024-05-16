<?php

declare(strict_types=1);

/**
 * file: AbilityMapper.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Service\Pokemon;

use Assert\AssertionFailedException;
use Szybo\Pokemon\Api\Data\Pokemon\AbilityInterfaceFactory;
use Szybo\Pokemon\Api\Data\Pokemon\AbilityInterface;
use Szybo\Pokemon\ValueObject\Pokemon\Ability\Description;
use Szybo\Pokemon\ValueObject\Pokemon\Ability\FrontendName;
use Szybo\Pokemon\ValueObject\Pokemon\Ability\Id;
use Szybo\Pokemon\ValueObject\Pokemon\Ability\Name;
use Szybo\Pokemon\ValueObject\Pokemon\Language;

/**
 * Class AbilityMapper
 *
 * @package Szybo\Pokemon\Service\Pokemon
 */
readonly class AbilityMapper
{
    /**
     * @param  AbilityInterfaceFactory  $pokemonFactory
     */
    public function __construct(
        private AbilityInterfaceFactory $abilityFactory,
    ) {
    }

    /**
     * @param  array  $data
     *
     * @return AbilityInterface|null
     */
    public function map(array $data): ?AbilityInterface
    {
        try {
            $ability = $this->abilityFactory->create();
            $id = Id::fromInt($data['id'] ?: null);
            $ability->setId($id);
            $name = Name::fromString($data['name'] ?: null);
            $ability->setName($name);

            $description = $this->extractDescription($data);

            if ($description) {
                $ability->setDescription($description);
            }

            $frontendName = $this->extractFrontendName($data);
            if ($frontendName) {
                $ability->setFrontendName($frontendName);
            }
        } catch (AssertionFailedException $e) {
            $ability = null;
        }

        return $ability;
    }

    /**
     * @param  array  $data
     *
     * @return Description|null
     * @throws AssertionFailedException
     */
    private function extractDescription(array $data): ?Description
    {
        if (!(isset($data['effect_entries']) && count($data['effect_entries']))) {
            return null;
        }

        $result = null;

        foreach ($data['effect_entries'] as $effect) {
            $languageCode = $effect['language']['name'] ?? null;
            $text = $effect['effect'] ?? null;

            if ($languageCode && $text
                && (Language::fromString($languageCode) === Language::EN)
            ) {
                $result = Description::fromString($text);
                break;
            }
        }

        return $result;
    }

    /**
     * @param  array  $data
     *
     * @return Name|null
     * @throws AssertionFailedException
     */
    private function extractFrontendName(array $data): ?FrontendName
    {
        if (!(isset($data['names']) && count($data['names']))) {
            return null;
        }

        $result = null;

        foreach ($data['names'] as $effect) {
            $languageCode = $effect['language']['name'] ?? null;
            $text = $effect['name'] ?? null;

            if ($languageCode && $text
                && (Language::fromString($languageCode) === Language::EN)
            ) {
                $result = FrontendName::fromString($text);
                break;
            }
        }

        return $result;
    }
}
