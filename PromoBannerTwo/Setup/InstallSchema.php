<?php

namespace DirtDevil\PromoBannerTwo\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable('dirtdevil_banners_slider_two')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Item ID'
        )->addColumn(
            'promobanner_heading',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Promobanner Heading'
        )->addColumn(
            'promobanner_subheading',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Promobanner Sub Heading'
        )->addColumn(
            'promobanner_url',
            Table::TYPE_TEXT,
            '255',
            ['nullable' => false],
            'Promobanner URL'
        )->addColumn(
            'promobanner_image',
            Table::TYPE_TEXT,
            '2M',
            ['nullable' => false],
            'Promobanner Image'
        )->addColumn(
            'created_at',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
            'Created At'
        )->addColumn(
            'updated_at',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
            'Updated At'
        )->addColumn(
            'status',
            Table::TYPE_SMALLINT,
            null,
            ['nullable' => false, 'default' => 1],
            '1 active 2 not active'
        )->setComment(
            'Promobanner Items'
        );
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
