<?php

declare(strict_types=1);

/**
 * file: AbilityCollection.php
 *
 * @author Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Model\Pokemon\Collection;

use Szybo\Pokemon\Api\Pokemon\AbilityCollectionInterface;
use Szybo\Pokemon\Model\CollectionAbstract;
use Szybo\Pokemon\Model\Pokemon\Ability;

/**
 * Class AbilityCollection
 *
 * @package Szybo\Pokemon\Model\Pokemon\Collection
 */
class AbilityCollection extends CollectionAbstract implements AbilityCollectionInterface
{
    public function getItemType(): string
    {
        return Ability::class;
    }
}
