<?php

declare(strict_types=1);

/**
 * file: PokemonApiUrlHelper.php
 *
 * @package Szybo\Pokemon\Service
 * @author Szymon Borowski <szymon.borowski@gmail.com>
 */
namespace Szybo\Pokemon\Service;

use Assert\AssertionFailedException;
use Szybo\Pokemon\Api\Config\SystemConfigProviderInterface;
use Szybo\Pokemon\Api\Data\ActionInterface;
use Szybo\Pokemon\Api\Data\ActionInterfaceFactory;
use Szybo\Pokemon\Api\PokemonApiUrlConverterInterface;
use Szybo\Pokemon\ValueObject\Request\Param;
use Szybo\Pokemon\ValueObject\Request\Uri;

/**
 * Class PokemonApiUrlHelper
 *
 * @package Szybo\Pokemon\Service
 */
readonly class PokemonApiUrlConverter implements PokemonApiUrlConverterInterface
{
    public function __construct(
        private ActionInterfaceFactory $actionFactory,
        private SystemConfigProviderInterface $systemConfigProvider,
    ) {
    }

    /**
     * @param $url
     *
     * @return ActionInterface
     * @throws AssertionFailedException
     */
    public function execute($url): ActionInterface
    {
        if (!$this->validateUrl($url)) {
            throw new \InvalidArgumentException('Invalid URL');
        }

        $entity = $this->extractEntity($url);
        $id = $this->extractId($url);

        $action = $this->actionFactory->create();
        $action->setUri(Uri::fromString($this->getUri($entity)));
        $action->addParam(Param::fromString('id', $id));

        return $action;
    }

    /**
     * @param $url
     *
     * @return bool
     */
    private function validateUrl($url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL)
            && str_starts_with($url, $this->systemConfigProvider->getUrl())
            && count(explode('/', $url,)) > 7;
    }

    /**
     * @param $url
     *
     * @return string
     */
    private function extractEntity($url): string
    {
        $urlParts = explode('/', $url);

        return (string)$urlParts[count($urlParts) - 3];

    }

    /**
     * @param $url
     *
     * @return string
     */
    private function extractId($url): string
    {
        $urlParts = explode('/', $url);

        return (string)$urlParts[count($urlParts) - 2];
    }

    /**
     * @param $entity
     *
     * @return string
     */
    private function getUri($entity): string
    {
        return '/' . $entity . '/:name/';
    }
}
