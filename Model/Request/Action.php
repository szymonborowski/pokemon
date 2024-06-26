<?php

declare(strict_types=1);

/**
 * file: Action.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Model\Request;

use Szybo\Pokemon\Api\Data\ActionInterface;
use Szybo\Pokemon\ValueObject\Request\Param;
use Szybo\Pokemon\ValueObject\Request\Uri;

/**
 * Class Action
 *
 * @package Szybo\Pokemon\Model
 */
class Action implements ActionInterface
{
    /**
     * @var Uri
     */
    private Uri $uri;

    /**
     * @var Param[]
     */
    private array $params;

    /**
     * @inheirtDoc
     */
    public function getUri(): Uri
    {
        return $this->uri;
    }

    /**
     * @inheirtDoc
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @inheirtDoc
     */
    public function setUri(Uri $uri): void
    {
        $this->uri = $uri;
    }

    /**
     * @inheirtDoc
     */
    public function addParam(Param $param): void
    {
        $this->params[$param->getName()] = $param;
    }
}
