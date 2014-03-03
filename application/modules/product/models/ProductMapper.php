<?php

class Product_Model_ProductMapper extends In2it_Model_Mapper
{
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Product_Model_DbTable_Product');
        }
        return parent::getDbTable();
    }
}

