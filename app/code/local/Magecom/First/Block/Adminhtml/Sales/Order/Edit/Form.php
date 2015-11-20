<?php
class Magecom_First_Block_Adminhtml_Sales_Order_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {

        if (Mage::getSingleton('adminhtml/session')->getPostsData())
        {
            $data = Mage::getSingleton('adminhtml/session')->getPostsData();
            Mage::getSingleton('adminhtml/session')->getPostsData(null);
        }
        elseif (Mage::registry('posts_data'))
        {
            $data = Mage::registry('posts_data')->getData();
        }
        else
        {
            $data = array();
        }
        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method' => 'post',
            'enctype' => 'multipart/form-data',
        ));
        $form->setUseContainer(true);
        $this->setForm($form);
        $fieldset = $form->addFieldset('edit_form', array(
            'legend' => Mage::helper('magecom_first')->__('Post Information')
        ));
        $fieldset->addField('title', 'text', array(
            'label'     => Mage::helper('magecom_first')->__('Title'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'title',
            'note'     => Mage::helper('magecom_first')->__('The name of the post.'),
        ));
        $fieldset->addField('content', 'text', array(
            'label'     => Mage::helper('magecom_first')->__('Description'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'content',
        ));
        $fieldset->addField('status', 'select', array(
            'label'     => Mage::helper('magecom_first')->__('Status'),
            'title'     => Mage::helper('magecom_first')->__('Status'),
            'name'      => 'status',
            'required'  => true,
            'value'  => '1',
            'options' => array('1' => 'Enabled','0' => 'Disabled'),
            'disabled' => false,
        ));
        $fieldset->addField('product_id', 'select', array(
            'label'     => Mage::helper('magecom_first')->__('Product for this Post'),
            'title'     => Mage::helper('magecom_first')->__('Product for this Post'),
            'name'      => 'product_id',
            'values' => Mage::helper('magecom_first')->getProductList(),
            'required'  => false,
            'disabled' => false,
        ));

        $form->setValues($data);


        return parent::_prepareForm();
    }
}