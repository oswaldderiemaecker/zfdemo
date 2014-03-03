<?php

class Product_Service_Product
{

    public function fetchAllProducts()
    {
        $collection = new Product_Model_ProductCollection();
        $mapper = new Product_Model_ProductMapper();
        $mapper->fetchAll($collection, 'Product_Model_Product');
        return $collection;
    }
}