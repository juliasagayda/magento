<?php
/**
 * Created by PhpStorm.
 * User: alice
 * Date: 10/7/15
 * Time: 7:59 PM
 */
class Magecom_First_IndexController extends Mage_Core_Controller_Front_Action {

    public  function indexAction(){

        $this->loadLayout();
        $this->renderLayout();

       // echo '<h1>YAAHOOOOOO</h1>';

    }
    public function viewAction()

    {
        $this->loadLayout();
        $this->renderLayout();
        var_dump(Mage::app()->getRequest()->getParam('id'));
    }
    public function saveFormAction()

    {

        $request =Mage::app()->getRequest()->getParams();
        $title = $request['title'];
        $content = $request['content'];
        Mage::getModel('magecom_first/posts')->setTitle($title)->setContent($content)->save();
        $this->_forward('index');


    }
}