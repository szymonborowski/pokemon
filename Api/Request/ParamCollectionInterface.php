<?php

declare(strict_types=1);

/**
 * file: ParamCollectionInterface.php
 *
 * @author Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Api\Request;

use ArrayAccess;
use Countable;
use Iterator;

/**
 * Interface ParamCollectionInterface
 *
 * @package Szybo\Pokemon\Api\Request
 */
interface ParamCollectionInterface extends ArrayAccess, Countable, Iterator
{
    /**
     * @return string
     */
    function getItemType(): string;

    /**
     * @param  array  $data
     *
     * @return void
     */
    function addData(array $data): void;
}
