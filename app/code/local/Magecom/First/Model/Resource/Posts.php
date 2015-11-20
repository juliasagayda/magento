<?php

class Magecom_First_Model_Resource_Posts extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
    $this->_init('magecom_first/posts', 'id');
    }
}