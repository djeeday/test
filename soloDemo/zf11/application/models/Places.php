<?php

class Application_Model_Places extends Zend_Db_Table
{
    protected $_name = 'places';
     
    /**
     * Fetch the latest $count places
     *
     * @param int $count
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function fetchLatest($count = 10)
    {
        return $this->fetchAll(null, 
            'date_created DESC', $count);
    }

}

