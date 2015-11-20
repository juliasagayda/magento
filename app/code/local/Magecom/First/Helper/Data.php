<?php
/**
 * Created by PhpStorm.
 * User: alice
 * Date: 10/26/15
 * Time: 8:50 PM
 */
class Magecom_First_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getProductList()
    {
        $products = Mage::getModel('catalog/product')->getCollection();
        $products->addAttributeToSelect('name');
        $output = array();
        foreach($products as $product){
            $output[$product->getId()] = $product->getId();
        }
        return $output;
    }

}