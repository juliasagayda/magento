<?php
class Magecom_First_Model_Resource_Posts_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('magecom_first/posts');
    }
}