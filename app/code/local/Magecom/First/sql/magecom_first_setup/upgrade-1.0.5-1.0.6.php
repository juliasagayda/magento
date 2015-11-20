<?php
$installer = $this;

$installer->startSetup ();

$table = $installer->getConnection()
    ->newTable($installer->getTable('customer/entity'))
    ->addColumn('points', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable'  => false,
        'default'   => '0',
        'comment' => 'Points'
    ), 'Points');

$installer->endSetup ();


