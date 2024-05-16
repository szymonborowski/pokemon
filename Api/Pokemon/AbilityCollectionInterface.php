<?php

declare(strict_types=1);

/**
 * file: AbilityCollectionInterface.php
 *
 * @author Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Api\Pokemon;

use ArrayAccess;
use Countable;
use Iterator;

/**
 * Interface AbilityCollectionInterface
 *
 * @package Szybo\Pokemon\Api\Pokemon
 */
interface AbilityCollectionInterface  extends ArrayAccess, Countable, Iterator
{

}
