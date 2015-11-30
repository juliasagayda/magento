<?php

class Magecom_Exam_Block_Adminhtml_Custom extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    protected function _construct()
    {
        parent::_construct();

        $helper = Mage::helper('magecom_exam');

        $this->_blockGroup  =  'magecom_exam';
        $this->_controller = 'adminhtml_custom';
        $this->_headerText = $helper->__('Sliders Management');
        $this->_addButtonLabel = $helper->__('Add Slider');
    }


}