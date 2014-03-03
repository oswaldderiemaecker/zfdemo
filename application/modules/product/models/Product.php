<?php

class Product_Model_Product extends In2it_Model_Abstract
{
    /**
     * @var int The sequence ID of this product
     */
    protected $_id;
    /**
     * @var string The title of this product
     */
    protected $_title;
    /**
     * @var string The description of this product
     */
    protected $_description;
    /**
     * @var string The url for the image of this product
     */
    protected $_image;
    /**
     * @var float The price of this product
     */
    protected $_price;
    /**
     * @var DateTime The date this product was created
     */
    protected $_created;
    /**
     * @var DateTime The date this product was modified
     */
    protected $_modified;

    public function init()
    {
        $filters = array (
            'id' => array (
                'Int',
            ),
            'title' => array (
                'StringTrim',
                'StripTags',
            ),
            'description' => array (
                'StringTrim',
                'StripTags',
            ),
            'image' => array (),
            'price' => array (),
        );
        $validators = array (
            'id' => array (
                'Int',
                array ('GreaterThan', array ('min' => -1)),
            ),
            'title' => array (
                'NotEmpty',
                array ('StringLength', array ('min' => 2, 'max' => 250)),
            ),
            'description' => array (
                array ('StringLength', array ('min' => 5, 'max' => 5000)),
            ),
            'image' => array (
                array('Callback', array(
                    'callback' => function($value) {
                        return Zend_Uri::check($value);
                    }
                )),
            ),
            'price' => array (
                'Float',
            ),
        );
        $this->setInputFilter(new Zend_Filter_Input($filters, $validators));
    }

    /**
     * @param \DateTime $created
     * @return Product_Model_Product
     */
    public function setCreated($created)
    {
        if (!$created instanceof DateTime) {
            $created = new DateTime($created);
        }
        $this->_created = $created;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        if (null === $this->_created) {
            $this->setCreated('now');
        }
        return $this->_created;
    }

    /**
     * @param string $description
     * @return Product_Model_Product
     */
    public function setDescription($description)
    {
        $this->_description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param int $id
     * @return Product_Model_Product
     */
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param string $image
     * @return Product_Model_Product
     */
    public function setImage($image)
    {
        $this->_image = $image;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->_image;
    }

    /**
     * @param \DateTime $modified
     * @return Product_Model_Product
     */
    public function setModified($modified)
    {
        if (!$modified instanceof DateTime) {
            $modified = new DateTime($modified);
        }
        $this->_modified = $modified;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getModified()
    {
        if (null === $this->_modified) {
            $this->setModified('now');
        }
        return $this->_modified;
    }

    /**
     * @param float $price
     * @return Product_Model_Product
     */
    public function setPrice($price)
    {
        $this->_price = $price;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->_price;
    }

    /**
     * @param string $title
     * @return Product_Model_Product
     */
    public function setTitle($title)
    {
        $this->_title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    public function populate($row)
    {
        if (is_array($row)) {
            $row = new ArrayObject($row, ArrayObject::ARRAY_AS_PROPS);
        }
        $this->_setSafeValues($row, 'id', 'setId')
            ->_setSafeValues($row, 'title', 'setTitle')
            ->_setSafeValues($row, 'description', 'setDescription')
            ->_setSafeValues($row, 'image', 'setImage')
            ->_setSafeValues($row, 'price', 'setPrice')
            ->_setSafeValues($row, 'created', 'setCreated')
            ->_setSafeValues($row, 'modified', 'setModified');
    }

    public function toArray()
    {
        return array (
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'image' => $this->getImage(),
            'price' => $this->getPrice(),
            'created' => $this->getCreated()->format('Y-m-d H:i:s'),
            'modified' => $this->getModified()->format('Y-m-d H:i:s'),
        );
    }

}

