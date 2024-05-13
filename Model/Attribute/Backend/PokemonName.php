<?php
declare(strict_types=1);

/**
 * file: PokemonName.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Model\Attribute\Backend;

use Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend;

/**
 * Class PokemonName
 *
 * @package Szybo\Pokemon\Model\Attribute\Backend
 */
class PokemonName extends AbstractBackend
{
    /**
     * @param $object
     *
     * @return void
     */
    public function validate($object)
    {
        // TODO: Implement validate() method or delete
    }
}
