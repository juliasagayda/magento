

<?php
/**
 * Created by PhpStorm.
 * User: alice
 * Date: 10/26/15
 * Time: 7:39 PM
 */
$installer = $this;
$installer->startSetup();
$installer->getConnection()
    ->addColumn($installer->getTable('magecom_first/posts'),
        'product_id',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_INTEGER,
            'default' => NULL,
            'comment' => 'Product'
        )
    );
$installer->endSetup();
