<?php

class Product_Service_Product
{
    /**
     * Fetching all products
     *
     * @return Product_Model_ProductCollection
     */
    public function fetchAllProducts()
    {
        $collection = new Product_Model_ProductCollection();
        $mapper = new Product_Model_ProductMapper();
        $mapper->fetchAll($collection, 'Product_Model_Product');
        return $collection;
    }

    /**
     * Fetching a product by providing it's sequence ID
     *
     * @param int $productId
     * @return null|Product_Model_Product
     */
    public function getProductById($productId)
    {
        $product = new Product_Model_Product();
        $mapper = new Product_Model_ProductMapper();
        $mapper->find($product, $productId);
        if ($product->getId() !== (int) $productId) {
            return null;
        }
        return $product;
    }

    /**
     * Stores product data into the database
     *
     * @param array $data
     * @return Product_Model_Product
     * @throws InvalidArgumentException
     */
    public function saveProduct($data)
    {
        $product = new Product_Model_Product($data);
        $mapper = new Product_Model_ProductMapper();
        if (!$product->getInputFilter()->isValid()) {
            throw new InvalidArgumentException('Provided product data was not valid');
        }
        $mapper->save($product);
        return $product;
    }

    /**
     * Alias for saveProduct
     *
     * @param $data
     * @return Product_Model_Product
     * @see saveProduct
     */
    public function addProduct($data)
    {
        return $this->saveProduct($data);
    }

    /**
     * Alias for saveProduct
     *
     * @param $data
     * @return Product_Model_Product
     * @see saveProduct
     */
    public function updateProduct($data)
    {
        return $this->saveProduct($data);
    }

    /**
     * Removes a product from the list
     *
     * @param int $productId
     */
    public function deleteProduct($productId)
    {
        $product = $this->getProductById($productId);
        if (null !== $product) {
            $mapper = new Product_Model_ProductMapper();
            $mapper->delete($product);
        }
    }
}