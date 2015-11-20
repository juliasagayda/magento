<?php


$installer = $this;
$installer->startSetup();
$table = $installer->getConnection()->newTable($installer->getTable('magecom_first/posts'))
        ->addColumn(
            'id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'unsigned' => true,
            'nullable' => false,
            'primary' => true,
            'identity' => true,
        ), 'Primary Key'
        )
        ->addColumn(
            'content', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => false,
        ), 'Post Content'
        )
        ->addColumn(
            'title', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
            'nullable' => false,
        ), 'Post Title'
        )
        ->setComment('My first table in the db magento');

$installer->getConnection()->createTable($table);
$installer->endSetup();