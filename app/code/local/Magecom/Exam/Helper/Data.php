<?php
/**
 * Created by PhpStorm.
 * User: alice
 * Date: 10/26/15
 * Time: 8:50 PM
 */
class Magecom_Exam_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function getImagePath($name = "")
    {
        $path = Mage::getBaseDir('media') . '/sliders' ;
        if($name) {
            return "{$path}/{$name}.jpg";
        } else {
            return $path;
        }
    }

    public function getImageUrl($id = 0)
    {
        $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . 'sliders/' ;
        if ($id) {
            return $url . $id . '.jpg';
        } else {
            return $url;
        }
    }
}