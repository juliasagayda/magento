<?php
/**
 * Created by PhpStorm.
 * User: alice
 * Date: 10/5/15
 * Time: 9:18 PM
 */
class Magecom_Exam_Block_Slider extends  Mage_Core_Block_Template {

    public function getSliderItem()
    {
        $sliders = Mage::getModel('magecom_exam/banner')->getCollection();
        return $sliders;
    }
    public function getImageUrl($path)
    {
        $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).'/sliders/'.$path;
            return $url;
    }
}