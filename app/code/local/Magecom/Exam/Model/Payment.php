<?php

class Magecom_Exam_Model_Payment extends Mage_Payment_Model_Method_Abstract {

    protected $_code = 'magecom_payment';

    protected $_isInitializeNeeded      = true;
    protected $_canUseInternal          = false;
    protected $_canUseForMultishipping  = false;

    /**
     * Return Order place redirect url
     *
     * @return string
     */
    public function getOrderPlaceRedirectUrl()
    {

    }



}
