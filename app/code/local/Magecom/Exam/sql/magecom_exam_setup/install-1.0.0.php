<?php


$installer = $this;
$installer->startSetup();
$table = $installer->getConnection()->newTable($installer->getTable('magecom_exam/banner'))
        ->addColumn(
            'id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'unsigned' => true,
            'nullable' => false,
            'primary' => true,
            'identity' => true,
        ), 'Primary Key'
        )
        ->addColumn(
            'image_path', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
                'nullable' => false,
            ), 'Path to image'
        )
        ->addColumn(
            'title', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
            'nullable' => false,
        ), 'Slider Title'
        );

$installer->getConnection()->createTable($table);
$installer->endSetup();