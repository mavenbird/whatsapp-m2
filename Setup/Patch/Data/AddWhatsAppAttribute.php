<?php
/**
 * Mavenbird Technologies Private Limited
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://mavenbird.com/Mavenbird-Module-License.txt
 *
 * =================================================================
 *
 * @category   Mavenbird
 * @package    Mavenbird_Whatsapp
 * @author     Mavenbird Team
 * @copyright  Copyright (c) 2018-2024 Mavenbird Technologies Private Limited ( http://mavenbird.com )
 * @license    http://mavenbird.com/Mavenbird-Module-License.txt
 */

namespace Mavenbird\WhatsApp\Setup\Patch\Data;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddWhatsAppAttribute implements DataPatchInterface
{
    public const BACKEND = \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class;
    public const APPLY_TO = 'simple,configurable,virtual,bundle,downloadable,grouped,giftcard';
    
   /**
    * @var ModuleDataSetupInterface
    */
    private $moduleDataSetup;

   /**
    * @var EavSetupFactory
    */
    private $eavSetupFactory;

   /**
    * @param ModuleDataSetupInterface $moduleDataSetup
    * @param EavSetupFactory $eavSetupFactory
    */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

   /**
    * Apply
    */
    public function apply()
    {
        /** @var EavSetup $eavSetup */
        
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        /**
        * Add attributes to the eav/attribute
        */
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'whatsapp_product',
            [
            'group' => 'General',
            'type' => 'int',
            'backend' => '',
            'frontend' => '',
            'label' => 'Share On WhatsApp',
            'input' => 'boolean',
            'class' => '',
            'source' => self::BACKEND,
            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
            'visible' => true,
            'required' => false,
            'user_defined' => true,
            'default' => '',
            'searchable' => false,
            'filterable' => false,
            'comparable' => false,
            'visible_on_front' => false,
            'used_in_product_listing' => true,
            'unique' => false,
            'apply_to' => self::APPLY_TO
            ]
        );
        /**
        * Add attributes to the eav/attribute
        */
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'whatsapp_text_product',
            [
            'group' => 'General',
            'type' => 'text',
            'backend' => '',
            'frontend' => '',
            'label' => 'Share On WhatsApp Extra Text',
            'input' => 'text',
            'class' => '',
            'source' => '',
            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
            'visible' => true,
            'required' => false,
            'user_defined' => true,
            'default' => '',
            'searchable' => false,
            'filterable' => false,
            'comparable' => false,
            'visible_on_front' => false,
            'used_in_product_listing' => true,
            'unique' => false,
            'apply_to' => self::APPLY_TO
            ]
        );
    }

   /**
    * Get Dependencies
    */
    public static function getDependencies()
    {
        return [];
    }

   /**
    * Get Aliases
    */
    public function getAliases()
    {
        return [];
    }
}
