<?php
declare(strict_types=1);

/**
 * file: PokemonName.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Model\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

/**
 * Class PokemonName
 *
 * @package Szybo\Pokemon\Model\Attribute\Source
 */
class PokemonName extends AbstractSource
{
    /**
     * Get all options
     *
     * @retrun array
     */
    public function getAllOptions(): array
    {
        if (!$this->_options) {
            $this->_options = [
                ['label' => '', 'value' => ''],
                ['label' => 'Pikachu', 'value' => 'pikachu'],
                ['label' => 'Charmander', 'value' => 'charmander'],
                ['label' => 'Bulbasaur', 'value' => 'bulbasaur'],
                ['label' => 'Squirtle', 'value' => 'squirtle'],
            ];
        }

        return $this->_options;
    }
}
