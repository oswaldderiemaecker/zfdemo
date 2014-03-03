<?php

class User_Model_User extends In2it_Model_Abstract
{
    /**
     * @var int The sequence ID for this user
     */
    protected $_id;
    /**
     * @var string The name of this user
     */
    protected $_name;
    /**
     * @var string The email of this user
     */
    protected $_email;
    /**
     * @var string The password of this user
     */
    protected $_password;
    /**
     * @var DateTime The creation date and time of this user
     */
    protected $_created;
    /**
     * @var DateTime The modified date and time of this user
     */
    protected $_modified;

    public function init()
    {
        $filters = array (
            'id' => array (
                'Int',
            ),
            'name' => array (
                'StringTrim',
                'StripTags',
            ),
            'email' => array (
                'StringTrim',
                'StripTags',
                'StringToLower',
            ),
            'password' => array (),
        );
        $validators = array (
            'id' => array (
                'Int',
                array ('GreaterThan', array ('min' => -1)),
            ),
            'name' => array (
                array ('StringLength', array ('min' => 2, 'max' => 150)),
            ),
            'email' => array (
                array ('StringLength', array ('min' => 5, 'max' => 250)),
                'EmailAddress',
            ),
            'password' => array (
                array ('StringLength', array ('min' => 6)),
            ),
        );
        $this->setInputFilter(new Zend_Filter_Input($filters, $validators));
    }
    /**
     * @param \DateTime $created
     * @return $this
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
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->_email = (string) $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->_id = (int) $id;
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
     * @param \DateTime $modified
     * @return $this
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
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->_name = (string) $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->_password = (string) $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * Populates this Model with data
     *
     * @param array|Zend_Db_Row $row The data
     * @return In2it_Model_Model
     */
    public function populate($row)
    {
        if (is_array($row)) {
            $row = new ArrayObject($row, ArrayObject::ARRAY_AS_PROPS);
        }
        $this->_setSafeValues($row, 'id', 'setId')
            ->_setSafeValues($row, 'name', 'setName')
            ->_setSafeValues($row, 'email', 'setEmail')
            ->_setSafeValues($row, 'password', 'setPassword')
            ->_setSafeValues($row, 'created', 'setCreated')
            ->_setSafeValues($row, 'modified', 'setModified');
    }

    /**
     * Converts this Model into an array
     *
     * @return array
     */
    public function toArray()
    {
        return array (
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
            'created' => $this->getCreated()->format('Y-m-d H:i:s'),
            'modified' => $this->getModified()->format('Y-m-d H:i:s'),
        );
    }

    public function getInputFilter()
    {
        if (null === $this->_inputFilter) {
            $this->init();
        }
        return parent::getInputFilter();
    }
}

