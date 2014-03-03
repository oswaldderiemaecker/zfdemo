<?php

class User_Service_User
{
    /**
     * Fetches all user entities from the database
     *
     * @return User_Model_UserCollection
     */
    public function getAllUsers()
    {
        $collection = new User_Model_UserCollection();
        $mapper = new User_Model_UserMapper();
        $mapper->fetchAll($collection, 'User_Model_User');
        return $collection;
    }

    /**
     * Find a user by it's ID from the database
     *
     * @param $userId
     * @return User_Model_User
     */
    public function findUserById($userId)
    {
        $user = new User_Model_User();
        $mapper = new User_Model_UserMapper();
        $mapper->find($user, $userId);
        return $user;
    }

    /**
     * Saving a user entity to the database
     *
     * @param $data
     * @return User_Model_User
     * @throws InvalidArgumentException
     */
    public function saveUser($data)
    {
        $user = new User_Model_User($data);
        $mapper = new User_Model_UserMapper();
        if (!$user->getInputFilter()->isValid()) {
            throw new InvalidArgumentException(
                'Provided data is not correct: ' . implode(
                    PHP_EOL, $user->getInputFilter()->getMessages()
                )
            );
        }
        $mapper->save($user);
        return $user;
    }

    /**
     * Alias for adding a user entity to the database
     *
     * @param array|Zend_Db_Rowset $data
     * @return User_Model_User
     */
    public function addUser($data)
    {
        return $this->saveUser($data);
    }

    /**
     * Alias for modifying a user entity in the database
     *
     * @param array|Zend_Db_Rowset $data
     * @return User_Model_User
     */
    public function modifyUser($data)
    {
        return $this->saveUser($data);
    }

    /**
     * Removing a user from the database (CAUTION)
     *
     * @param int $userId
     * @return void
     */
    public function removeUser($userId)
    {
        $user = $this->findUserById($userId);
        $mapper = new User_Model_UserMapper();
        $mapper->delete($user);
    }

    public function generateTestUsers()
    {
        require_once APPLICATION_PATH . '/../vendor/autoload.php';
        $faker = Faker\Factory::create();
        $faker->seed(1234);
        $mapper = new User_Model_UserMapper();
        for ($i = 0; $i < 1000; $i++) {
            $data = array (
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->lexify($string = '???????????'),
                'created' => $faker->dateTime->format('Y-m-d H:i:s'),
                'modified' => $faker->dateTime->format('Y-m-d H:i:s'),
            );
            $user = new User_Model_User($data);
            $mapper->save($user);
        }
    }
}