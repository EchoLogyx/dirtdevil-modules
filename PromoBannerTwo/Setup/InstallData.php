<?php

namespace DirtDevil\PromoBannerTwo\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()->insert(
            $setup->getTable('dirtdevil_banners_slider_two'),
            [
                'promobanner_heading' => 'Item 1',
                'promobanner_subheading' => 'promobanner subheading',
                'promobanner_url' => 'promobanner  url',
                'promobanner_image' => 'promobanner image url'
            ]
        );


        $setup->getConnection()->insert(
            $setup->getTable('dirtdevil_banners_slider_two'),
            [
                'promobanner_heading' => 'Item 2',
                'promobanner_subheading' => 'promobanner subheading 2',
                'promobanner_url' => 'promobanner  url 2',
                'promobanner_image' => 'promobanner image url 2'
            ]
        );


        $setup->endSetup();
    }
}
