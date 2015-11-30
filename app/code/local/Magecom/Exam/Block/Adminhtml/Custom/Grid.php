<?php

class Magecom_Exam_Block_Adminhtml_Custom_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('magecom_exam/banner')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addExportType('*/*/exportCsv', Mage::helper('magecom_exam')->__('CSV'));

        $helper = Mage::helper('magecom_exam');

        $this->addColumn('id', array(
            'header' => $helper->__('Post ID'),
            'index' => 'id',
            'width'     => '80px',
        ));

        $this->addColumn('image_path', array(
            'header'    => Mage::helper('magecom_exam')->__('Banner Image'),
            'align'     => 'left',
            'index'     => 'image_path',
            'width'     => '100',
            'renderer'  => 'Magecom_Exam_Block_Adminhtml_Custom_Renderer_Image'
        ));

        $this->addColumn('title', array(
            'header' => $helper->__('Title'),
            'index' => 'title',
            'type' => 'text',
        ));
        return parent::_prepareColumns();
    }

    public function getRowUrl($model)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $model->getId(),
        ));
    }
}