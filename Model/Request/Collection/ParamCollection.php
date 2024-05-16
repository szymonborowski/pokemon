<?php

declare(strict_types=1);

/**
 * file: AbilityCollection.php
 *
 * @author Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Model\Request\Collection;

use Szybo\Pokemon\Api\Request\ParamCollectionInterface;
use Szybo\Pokemon\Model\CollectionAbstract;
use Szybo\Pokemon\ValueObject\Request\Param;

/**
 * Class AbilityCollection
 *
 * @package Szybo\Pokemon\Model\Pokemon\Collection
 */
class ParamCollection extends CollectionAbstract implements ParamCollectionInterface
{
    public function getItemType(): string
    {
        return Param::class;
    }
}
