<?php
/**
 * Created by PhpStorm.
 * User: alice
 * Date: 10/26/15
 * Time: 7:39 PM
 */
$installer = $this;

$installer->startSetup();

$customerEntityTypeId = $installer->getEntityTypeId('customer');
$attributeCode = 'points';

$installer->removeAttribute($customerEntityTypeId, $attributeCode );
$installer->addAttribute('points', $attributeCode, array(
    'type' => 'varchar',
    'input' => 'text',
    'label' => 'Points for order',
    'global' => true,
    'visible' => false,
    'required' => false,
    'user_defined' => true,
    'visible_on_front' => false
));

//the values can be taken from customer_form_attribute table
$usedInCustomerAddressForms = array(
    'adminhtml_customer',
    'customer_account_create'
);

$attribute = Mage::getSingleton('eav/config')->getAttribute('customer', $attributeCode);
$attribute->setData('used_in_forms', $usedInCustomerAddressForms);
$attribute->save();

$this->endSetup();
