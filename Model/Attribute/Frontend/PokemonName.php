<?php
declare(strict_types=1);

/**
 * file: PokemonName.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Model\Attribute\Frontend;

use Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend;
use Magento\Framework\DataObject;

/**
 * Class PokemonName
 *
 * @package Szybo\Pokemon\Model\Attribute\Frontend
 */
class PokemonName extends AbstractFrontend
{
    /**
     * @param DataObject $object
     *
     * @return string
     */
    public function getValue(DataObject $object): string
    {
        $value = $object->getData($this->getAttribute()->getAttributeCode());

        return ucfirst($value);
    }
}
