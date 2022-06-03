<?php

namespace Aventi\ShippingMethod\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
        $installer = $setup;

        $installer->startSetup();

        if(version_compare($context->getVersion(), '1.1.0', '<')) {
            if (!$installer->tableExists('aventi_city_rates')) {
                $table = $installer->getConnection()->newTable(
                    $installer->getTable('aventi_city_rates')
                )
                    ->addColumn(
                        'city_rate_id',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        null,
                        [
                            'identity' => true,
                            'nullable' => false,
                            'primary'  => true,
                            'unsigned' => true,
                        ],
                        'City ID'
                    )
                    ->addColumn(
                        'post_code',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        ['nullable => false'],
                        'postal code'
                    )
                    ->addColumn(
                        'price',
                        \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
                        255,
                        [],
                        'shipping price'
                    )
                    ->addColumn(
                        'created_at',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                        'Created At'
                    )->addColumn(
                        'updated_at',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                        'Updated At')
                    ->setComment('Post Table');
                $installer->getConnection()->createTable($table);

                $installer->getConnection()->addIndex(
                    $installer->getTable('aventi_city_rates'),
                    $setup->getIdxName(
                        $installer->getTable('aventi_city_rates'),
                        ['post_code'],
                        \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                    ),
                    ['post_code'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                );
            }
        }

        $installer->endSetup();
    }
}
