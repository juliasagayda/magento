<?php
/**
 * Created by PhpStorm.
 * User: alice
 * Date: 10/5/15
 * Time: 9:18 PM
 */
class Magecom_First_Block_Adminhtml_Sales_Order extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    protected function _construct()
    {

        parent::_construct();
        $helper = Mage::helper('magecom_first');
        $this->_blockGroup  =  'magecom_first';
        $this->_controller = 'adminhtml_sales_order';

        $this->_headerText = $helper->__('Posts Management');
        $this->_addButtonLabel = $helper->__('Add Posts');
    }
}