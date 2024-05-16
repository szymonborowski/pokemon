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
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Validator\ValidateException;
use Szybo\Pokemon\Model\Product\Attribute\Source\PokemonName as Source;

/**
 * Class InstallData
 *
 * @package Szybo\Pokemon\Setup
 */
readonly class InstallData implements InstallDataInterface
{
    const ATTRIBUTE_CODE = 'pokemon_name';
    const ATTRIBUTE_LABEL = 'Pokemon Name';

    /**
     * @param  EavSetupFactory  $eavSetupFactory
     */
    public function __construct(
        private EavSetupFactory $eavSetupFactory
    ) {
    }

    /**
     * @param  ModuleDataSetupInterface  $setup
     * @param  ModuleContextInterface  $context
     *
     * @return void
     * @throws LocalizedException
     * @throws ValidateException
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ):void {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(
            Product::ENTITY,
            self::ATTRIBUTE_CODE,
            [
                'type'                    => 'varchar',
                'backend'                 => '',
                'frontend'                => '',
                'label'                   => self::ATTRIBUTE_LABEL,
                'input'                   => 'select',
                'class'                   => '',
                'source'                  => Source::class,
                'global'                  => ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible'                 => true,
                'required'                => false,
                'user_defined'            => false,
                'default'                 => '',
                'searchable'              => true,
                'filterable'              => false,
                'comparable'              => false,
                'visible_on_front'        => false,
                'used_in_product_listing' => true,
                'unique'                  => false,
            ]
        );
    }
}
