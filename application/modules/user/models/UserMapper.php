<?php

class User_Model_UserMapper extends In2it_Model_Mapper
{
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('User_Model_DbTable_User');
        }
        return parent::getDbTable();
    }

    public function save(In2it_Model_Abstract $user)
    {
        if (0 < $user->getId()) {
            $user->setModified('now');
        }
        parent::save($user);
    }
}

