<?php

class Magecom_Exam_Adminhtml_CustomController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('custom/custom');

        $contentBlock = $this->getLayout()->createBlock('magecom_exam/adminhtml_custom');
        $this->_addContent($contentBlock);
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        Mage::register('banner_data', Mage::getModel('magecom_exam/banner')->load($id));

        $this->loadLayout()->_setActiveMenu('custom/custom');
        $this->_addContent($this->getLayout()->createBlock('magecom_exam/adminhtml_custom_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {

        $id = $this->getRequest()->getParam('id');
        if($data = $this->getRequest()->getPost()) {
            try {
                $helper = Mage::helper('magecom_exam');
                $model = Mage::getModel('magecom_exam/banner');

                $model->setData($data)->setId($id);
                $id = $model->getId();


                if (isset($_FILES['image_path']['name']) && $_FILES['image_path']['name'] != '') {
                    $uploader = new Varien_File_Uploader('image_path');
                    $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'));
                    $uploader->setAllowRenameFiles(false);
                    $uploader->setFilesDispersion(false);
                    $uploader->save($helper->getImagePath(), $_FILES['image_path']['name']);
                    $data['image_path'] = $_FILES['image_path']['name'] ;
                } else {
                    if (isset($data['image_path']['delete']) && $data['image_path']['delete'] == 1) {

                        @unlink($helper->getImagePath($id) . "-------");
                    } else {
                        $str =  $data['image_path']['value'];
                        $parts = explode('/', $str);
                        $model->getData($id);
                        $data['image_path'] = $parts[1];
                    }
                }

                $model->setData($data)->setId($id);
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Post was saved successfully'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'id' => $this->getRequest()->getParam('id')
                ));
            }

            return;
        }

        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');


    }

    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('magecom_exam/banner')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Slider was deleted successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }

    public function exportCsvAction()
    {
        $fileName   = 'banners.csv';
        $grid       = $this->getLayout()->createBlock('magecom_exam/adminhtml_custom');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }
}
