<?php

class User_UserEntityController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function getAction()
    {
        $userId = $this->getRequest()->getParam('id', null);
        if (null !== $userId) {
            $service = new User_Service_User();
            $this->_helper->json($service->findUserById($userId));
        }
    }

    public function postAction()
    {
        // action body
    }

    public function putAction()
    {
        // action body
    }

    public function deleteAction()
    {
        // action body
    }

    public function headAction()
    {
        // action body
    }


}











