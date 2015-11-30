<?php

class Magecom_Exam_Block_Adminhtml_Custom_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {
//        $helper = Mage::helper('itdelight_first');
        $model = Mage::registry('banner_data');
//        Zend_Debug::dump($model);

        if (Mage::getSingleton('adminhtml/session')->getBannerData())
        {
            $data = Mage::getSingleton('adminhtml/session')->getBannerData();
            Mage::getSingleton('adminhtml/session')->getBannerData(null);
        }
        elseif (Mage::registry('banner_data'))
        {
            $data = Mage::registry('banner_data');
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
            'legend' => Mage::helper('magecom_exam')->__('Post Information')
        ));

        $fieldset->addField('title', 'text', array(
            'label'     => Mage::helper('magecom_exam')->__('Title'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'title',
            'note'     => Mage::helper('magecom_exam')->__('The name of the post.'),
        ));


        $fieldset->addField('image_path', 'image', array(
            'label' => Mage::helper('magecom_exam')->__('Image'),
            'name' => 'image_path',
        ));

        if($data->getData('image_path')){
            $data->setData('image_path','magecom_exam/'.$model->getData('image_path'));
        } else {
            $data->setData('image_path', $model->getData('image_path'));
        }

        $form->setValues($data->getData());

        return parent::_prepareForm();
    }
}