<?php

class User_UserCollectionController extends Zend_Rest_Controller
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
        $service = new User_Service_User();
        $this->_helper->json($service->getAllUsers());
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











