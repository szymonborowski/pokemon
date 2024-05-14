<?php

declare(strict_types=1);

/**
 * file: ParamBinder.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Service\Request;

use Assert\AssertionFailedException;
use Szybo\Pokemon\ValueObject\Request\Param;
use Szybo\Pokemon\ValueObject\Request\Uri;

class ParamBinder
{
    /**
     * @param  Uri  $uri
     * @param  Param[]  $params
     *
     * @return Uri
     * @throws AssertionFailedException
     */
    public function bind(Uri $uri, array $params): Uri
    {
        $uri = $uri->getValue();

        foreach ($params as $param) {
            str_replace($this->strToReplace($param), $param->getValue(), $uri);
        }

        return Uri::fromString($uri);
    }

    /**
     * @param  Param  $param
     *
     * @return string
     */
    private function strToReplace(Param $param): string
    {
        return ':' . $param->getName();
    }
}
