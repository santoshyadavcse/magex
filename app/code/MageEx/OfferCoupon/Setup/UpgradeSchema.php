<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MageEx\OfferCoupon\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

/**
 * Upgrade the Newsletter module DB scheme
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $connection = $setup->getConnection();

           $column = [
				'type' =>  \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				'length' => 255,
				'nullable' => false,
				'comment' => 'ORDER ID',
				'default' => ''
			];
			$connection->addColumn($setup->getTable('coupon_offer'), 'order_id', $column);
        }

        $setup->endSetup();
    }
}

