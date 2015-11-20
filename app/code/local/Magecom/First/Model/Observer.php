<?php
/**
 * Created by PhpStorm.
 * User: alice
 * Date: 11/2/15
 * Time: 8:08 PM
 */
class Magecom_First_Model_Observer {

    public function doublePrice($observer) {
        $event = $observer->getEvent();
        $object = $event->getObject();
        $qty_count = Mage::getStoreConfig('test/test_group/qty_obs');
        foreach ($object as $item)
        {
            $price = $item->getPrice();
            $item->setPrice($price*$qty_count);
        }

    }

    public function adminEmail($observer) {
        $event = $observer->getEvent();
        $object = $event->getObject();
        $title = $object->getTitle();
        $content = $object->getContent();
        $email = Mage::getStoreConfig('test/test_group/admin_email');
        mail($email, $title, $content);

    }
}