<?php
/**
 * Created by PhpStorm.
 * User: julia
 * Date: 11/22/15
 * Time: 9:33 PM
 */
class Magecom_Carrier_Model_Observer
{
    public function PointsPayment($observer)
    {
        $event = $observer->getEvent();
//        $course = Mage::getStoreConfig('sales/payment/points_course');
//        var_dump($course);die();
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $customer= Mage::getSingleton('customer/session')->getCustomer();
            $cus_id = $customer->getId();
            $payment= $event->getData('payment')->getData('method');
            $points =($customer->getPoints());

            $total = $observer->getPayment()->getOrder()->getData('grand_total');
            if ($payment == 'magecom_payment') {
                if ($points <= $total) {
                    $new_points =round($total)-$points;
                    $customer = Mage::getModel('customer/customer')->load($cus_id);
                } else {
                    $new_points =round($total);
                    $customer = Mage::getModel('customer/customer')->load($cus_id);
                }
                $customer->setPoints($new_points)->save();
            }
        }
    }
}