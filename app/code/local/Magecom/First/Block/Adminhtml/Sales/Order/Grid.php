<?php
/**
 * Created by PhpStorm.
 * User: alice
 * Date: 10/5/15
 * Time: 9:18 PM
 */
class Magecom_First_Block_Adminhtml_Sales_Order_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('magecom_first/posts')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    protected function _prepareColumns()
    {
        $helper = Mage::helper('magecom_first');
        $this->addColumn('id', array(
            'header' => $helper->__('Post ID'),
            'index' => 'id',
            'width'     => '80px',
        ));
        $this->addColumn('title', array(
            'header' => $helper->__('Title'),
            'index' => 'title',
            'type' => 'text',
        ));

        $this->addColumn('content', array(
            'header' => $helper->__('Content'),
            'index' => 'content',
            'type' => 'text',
        ));

        $this->addColumn('status', array(
            'header'    => $helper->__('Status'),
            'index'     => 'status',
            'type'      => 'options',
            'options'   => array(
                '1' => $helper->__('Enabled'),
                '0' => $helper->__('Disabled'),
            ),
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