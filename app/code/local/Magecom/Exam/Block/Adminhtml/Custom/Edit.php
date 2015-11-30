<?php

class Magecom_Exam_Block_Adminhtml_Custom_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    protected function _construct()
    {
        $this->_blockGroup = 'magecom_exam';
        $this->_controller = 'adminhtml_custom';

    }

    public function getHeaderText()
    {

        $helper = Mage::helper('magecom_exam');
        $model = Mage::registry('banner_data');

        if ($model->getId()) {
            return $helper->__("Edit Slider item '%s'", $this->escapeHtml($model->getTitle()));
        } else {
            return $helper->__("Add Slider item");
        }
    }
}
