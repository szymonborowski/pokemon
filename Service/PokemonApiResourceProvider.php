<?php

declare(strict_types=1);

namespace Szybo\Pokemon\Service;

use Szybo\Pokemon\Api\PokemonApiResourceProviderInterface;
use Szybo\Pokemon\ValueObject\Request\ResourceType;

class PokemonApiResourceProvider implements PokemonApiResourceProviderInterface
{
    public function getName(ResourceType $resourceType): string
    {
        return match ($resourceType) {
            ResourceType::POKEMON => 'pokemon',
            ResourceType::ABILITY => 'ability'
        };
    }

    public function getUriTemplate(ResourceType $resourceType): string
    {
        return match ($resourceType) {
            ResourceType::POKEMON => '/pokemon/:name',
            ResourceType::ABILITY => '/ability/:name'
        };
    }
}
