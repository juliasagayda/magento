<?php
/**
 * Created by PhpStorm.
 * User: alice
 * Date: 10/5/15
 * Time: 9:18 PM
 */
class Magecom_First_Block_Test extends  Mage_Core_Block_Template {
    public function  testFunc() {
        return 'Julia Block';
    }

    public function getProducts($name) {
        $products_collect_by_name = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('name', array('like' => $name.'%'));
        return $products_collect_by_name;
    }

    public function getPosts() {
        $post_collect = Mage::getModel('magecom_first/posts')->getCollection();
        return $post_collect;
    }
}