<?php
declare(strict_types=1);

/**
 * file: InstallData.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Setup;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Szybo\Pokemon\Model\Attribute\Backend\PokemonName as Backend;
use Szybo\Pokemon\Model\Attribute\Frontend\PokemonName as Frontend;
use Szybo\Pokemon\Model\Attribute\Source\PokemonName as Source;

/**
 * Class InstallData
 *
 * @package Szybo\Pokemon\Setup
 */
class InstallData implements InstallDataInterface
{
    /**
     * @param  EavSetupFactory  $eavSetupFactory
     */
    public function __construct(
        private readonly EavSetupFactory $eavSetupFactory
    ) {
    }

    /**
     * @param  ModuleDataSetupInterface  $setup
     * @param  ModuleContextInterface  $context
     *
     * @return void
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ):void {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(
            Product::ENTITY,
            'pokemon_name',
            [
                'type'                    => 'varchar',
                'backend'                 => Backend::class,
                'frontend'                => Frontend::class,
                'label'                   => 'Pokemon Name',
                'input'                   => 'select',
                'class'                   => '',
                'source'                  => Source::class,
                'global'                  => ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible'                 => true,
                'required'                => false,
                'user_defined'            => false,
                'default'                 => '',
                'searchable'              => false,
                'filterable'              => false,
                'comparable'              => false,
                'visible_on_front'        => false,
                'used_in_product_listing' => true,
                'unique'                  => false,
            ]
        );
    }
}
