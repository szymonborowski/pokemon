<?php

declare(strict_types=1);

/**
 * file: ActionInterface.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Api\Data;

use Szybo\Pokemon\ValueObject\Request\Param;
use Szybo\Pokemon\ValueObject\Request\Uri;

/**
 * Interface ActionInterface
 *
 * @package Szybo\Pokemon\Api\Data
 */
interface ActionInterface
{
    /**
     * @return Uri
     */
    public function getUri(): Uri;

    /**
     * @return array
     */
    public function getParams(): array;


    /**
     * @param  Uri  $uri
     *
     * @return void
     */
    public function setUri(Uri $uri): void;

    /**
     * @param  Param  $param
     *
     * @return void
     */
    public function addParam(Param $param): void;
}
