<?php
class Magecom_Exam_Block_Adminhtml_Custom_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

    public function render(Varien_Object $row)
    {
        $html = '<img ';
        $html .= 'id="' . $row->getId() . '" ';
        $html .= 'src="' . Mage::getBaseUrl( Mage_Core_Model_Store::URL_TYPE_WEB, true ) .'media/sliders/'.  $row->getData('image_path') . '"';
        $html .= 'class="grid-image ' . $this->getColumn()->getInlineCss() . '" style="width:100px;"/>';

        return $html;
    }
}
