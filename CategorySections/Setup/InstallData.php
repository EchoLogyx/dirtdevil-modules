<?php

namespace DirtDevil\CategorySections\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetupFactory;

class InstallData implements InstallDataInterface
{
    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * InstallData constructor.
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    )
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        // Product Listing Banner 1

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'show_plp_banner_1',
            [
                'type' => 'int',
                'label' => 'Show Specification',
                'input' => 'boolean',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => 0,
                'group' => 'Specification 1',
                'backend' => ''
            ]
        );


        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'plp_banner_image_1',
            [
                'type' => 'varchar',
                'label' => 'Specification Image',
                'input' => 'image',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => null,
                'group' => 'Specification 1',
                'backend' => 'Magento\Catalog\Model\Category\Attribute\Backend\Image'
            ]
        );

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'plp_banner_title_1',
            [
                'type' => 'varchar',
                'label' => 'Specification Title',
                'input' => 'text',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => null,
                'group' => 'Specification 1',
                'backend' => ''
            ]
        );


        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'plp_banner_description_1',
            [
                'type' => 'text',
                'label' => 'Specification Description',
                'input' => 'textarea',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => null,
                'group' => 'Specification 1',
                'backend' => ''
            ]
        );



        // Product Listing Banner 2

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'show_plp_banner_2',
            [
                'type' => 'int',
                'label' => 'Show Specification',
                'input' => 'boolean',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => 0,
                'group' => 'Specification 2',
                'backend' => ''
            ]
        );



        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'plp_banner_image_2',
            [
                'type' => 'varchar',
                'label' => 'Specification Image',
                'input' => 'image',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => null,
                'group' => 'Specification 2',
                'backend' => 'Magento\Catalog\Model\Category\Attribute\Backend\Image'
            ]
        );

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'plp_banner_title_2',
            [
                'type' => 'varchar',
                'label' => 'Specification Title',
                'input' => 'text',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => null,
                'group' => 'Specification 2',
                'backend' => ''
            ]
        );



        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'plp_banner_description_2',
            [
                'type' => 'text',
                'label' => 'Specification Description',
                'input' => 'textarea',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => null,
                'group' => 'Specification 2',
                'backend' => ''
            ]
        );

        // Product Listing Banner 3

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'show_plp_banner_3',
            [
                'type' => 'int',
                'label' => 'Show Specification',
                'input' => 'boolean',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => 0,
                'group' => 'Specification 3',
                'backend' => ''
            ]
        );

        

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'plp_banner_image_3',
            [
                'type' => 'varchar',
                'label' => 'Specification Image',
                'input' => 'image',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => null,
                'group' => 'Specification 3',
                'backend' => 'Magento\Catalog\Model\Category\Attribute\Backend\Image'
            ]
        );

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'plp_banner_title_3',
            [
                'type' => 'varchar',
                'label' => 'Specification Title',
                'input' => 'text',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => null,
                'group' => 'Specification 3',
                'backend' => ''
            ]
        );

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'plp_banner_description_3',
            [
                'type' => 'text',
                'label' => 'Specification Description',
                'input' => 'textarea',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => null,
                'is_wysiwyg_enabled' => true,
                'group' => 'Specification 3',
                'backend' => ''
            ]
        );

    }
}

