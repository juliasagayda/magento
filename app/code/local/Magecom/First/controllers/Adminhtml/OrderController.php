<?php
/**
 * Created by PhpStorm.
 * User: alice
 * Date: 10/7/15
 * Time: 7:59 PM
 */
class Magecom_First_Adminhtml_OrderController extends Mage_Adminhtml_Controller_Action {

    public  function indexAction(){

        $this->_title($this->__('Sales'))->_title($this->__('Orders Magecom'));
        $this->loadLayout();
        $this->_setActiveMenu('sales/sales');
        $this->_addContent($this->getLayout()->createBlock('magecom_first/adminhtml_sales_order'));
        $this->renderLayout();
    }
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('magecom_first/adminhtml_sales_order_grid')->toHtml()
        );
    }

    public function newAction()
    {
        $this->_forward('edit');
    }
    public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        Mage::register('posts_data', Mage::getModel('magecom_first/posts')->load($id));
        $this->loadLayout()->_setActiveMenu('order');
        $this->_addContent($this->getLayout()->createBlock('magecom_first/adminhtml_sales_order_edit'));
        $this->renderLayout();
    }
    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost())
        {
            $model = Mage::getModel('magecom_first/posts');
            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
            }
            $model->setData($data);
            Mage::getSingleton('adminhtml/session')->setFormData($data);
            try {
                if ($id) {
                    $model->setId($id);
                }
                $model->save();
                if (!$model->getId()) {
                    Mage::throwException(Mage::helper('magecom_first')->__('Error saving example'));
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('magecom_first')->__('Example was successfully saved.'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                // The following line decides if it is a "save" or "save and continue"
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                } else {
                    $this->_redirect('*/*/');
                }
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                if ($model && $model->getId()) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                } else {
                    $this->_redirect('*/*/');
                }
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('magecom_first')->__('No data found to save'));
        $this->_redirect('*/*/');
    }
    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('magecom_first/posts')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Post was deleted successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }

}