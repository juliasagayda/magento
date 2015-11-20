<?php
/**
 * Created by PhpStorm.
 * User: alice
 * Date: 10/26/15
 * Time: 7:39 PM
 */
$installer = $this;
$connection = $installer->getConnection();
$installer->startSetup();
$installer->getConnection()
    ->addColumn($installer->getTable('magecom_first/posts'),
        'filename',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
            'comment' => 'Filename'
        )
    );
$installer->endSetup();
