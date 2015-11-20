<?php
class Magecom_First_Block_Adminhtml_Sales_Order_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'magecom_first';
        $this->_controller = 'adminhtml_sales_order';

        $this->_addButton('save_and_continue', array(
            'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
        ), -100);
        $this->_updateButton('save', 'label', Mage::helper('magecom_first')->__('Save Example'));

    }
    public function getHeaderText()
    {
        $helper = Mage::helper('magecom_first');
        $model = Mage::registry('posts_data');
        if ($model->getId()) {
            return $helper->__("Edit Post '%s'", $this->escapeHtml($model->getTitle()));
        } else {
            return $helper->__("Add Post item");
        }
    }
    protected function _prepareLayout()
    {
        if ($this->_blockGroup && $this->_controller && $this->_mode) {
            $this->setChild('form', $this->getLayout()->createBlock($this->_blockGroup . '/' . $this->_controller . '_' . $this->_mode . '_form'));
        }
        return parent::_prepareLayout();
    }
}