<?php

class User_UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        return $this->_helper->redirector('list', 'user', 'user');
    }

    public function listAction()
    {
        $service = new User_Service_User();
        $this->view->users = $service->getAllUsers();
    }

    public function editAction()
    {
        $form = new User_Form_User(
            array (
                'method' => 'post',
                'action' => '/user/user/edit',
            )
        );

        $id = $this->getRequest()->getParam('id', 0);

        $userMapper = new User_Model_UserMapper();

        if (0 < (int) $id) {
            $user = new User_Model_User();
            $userMapper->find($user, $id);
            $form->populate($user->toArray());
        }

        if ($this->getRequest()->isPost()) {
            $user = new User_Model_User($this->getRequest()->getPost());
            if ($user->getInputFilter()->isValid()) {
                $userMapper->save($user);
                return $this->_helper->redirector('list', 'user', 'user');
            } else {
                $form->setElementErrors($user->getInputFilter()->getMessages());
            }
        }
        $this->view->form = $form;

    }

    public function deleteAction()
    {
        // action body
    }
}







