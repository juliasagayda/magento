<?php
/**
 * Created by PhpStorm.
 * User: julia
 * Date: 11/22/15
 * Time: 9:33 PM
 */
class Magecom_Exam_Model_Observer extends Varien_Event_Observer
{
    public function PointsPayment($observer)
    {
        $event = $observer->getEvent();
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $customer= Mage::getSingleton('customer/session')->getCustomer();
            $cus_id = $customer->getId();
            $customer = Mage::getModel('customer/customer')->load($cus_id);
            $payment= $event->getData('payment')->getData('method');
            $total = $observer->getPayment()->getOrder()->getData('grand_total');
            if ($payment == 'magecom_payment') {
                $points =$customer->getPoints();
                if ($points >= $total) {
                    $new_points =$points - round($total);
                } else {
                    $new_points =round($total)+$points;
                }
                $customer->setPoints($new_points)->save();
            }
        }
    }

    public  function  appendCustomColumn(Varien_Event_Observer $observer)
    {
        $block = $observer->getBlock();
        if (!isset($block)) {
            return $this;
        }
        if ($block->getType() == 'adminhtml/customer_grid') {
            /* @var $block Mage_Adminhtml_Block_Customer_Grid */
            $block->addColumnAfter('points', array(
                'header'	=> 'Points for Order',
                'type'  	=> 'text',
                'index' 	=> 'points',
            ), 'email');

        }
    }

    public function beforeBlockToHtml(Varien_Event_Observer $observer) {
        $grid = $observer->getBlock();
        /**
         * Mage_Adminhtml_Block_Customer_Grid
         */
        if ($grid instanceof Mage_Adminhtml_Block_Customer_Grid) {
            $grid->addColumnAfter('points', array(
                'header'	=> 'Points for Order',
                'type'  	=> 'text',
                'index' 	=> 'points',
            ), 'email');


        }
    }

    public function beforeCollectionLoad(Varien_Event_Observer $observer) {
        $collection = $observer->getCollection();
        if (!isset($collection)) {
            return;
        }

        /**
         * Mage_Customer_Model_Resource_Customer_Collection
         */
        if ($collection instanceof Mage_Customer_Model_Resource_Customer_Collection) {
            /* @var $collection Mage_Customer_Model_Resource_Customer_Collection */
            $collection->addAttributeToSelect('points');
//            Zend_Debug::dump( $collection->addAttributeToSelect('points')->getData());die();
        }
    }


}