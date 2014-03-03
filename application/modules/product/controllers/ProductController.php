<?php

class Product_ProductController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->_helper->redirector('list', 'product', 'product');
    }

    public function listAction()
    {
        $service = new Product_Service_Product();
        $this->view->products = $service->fetchAllProducts();
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('id', 0);
        $mapper = new Product_Model_ProductMapper();

        $form = new Product_Form_Product(
            array (
                'method' => 'post',
                'action' => '/product/product/edit',
            )
        );
        if (0 < (int) $id) {
            $product = new Product_Model_Product();
            $mapper->find($product, $id);
            $form->populate($product->toArray());
            unset ($product);
        }

        if ($this->getRequest()->isPost()) {
            $product = new Product_Model_Product($this->getRequest()->getPost());
            if ($product->getInputFilter()->isValid()) {
                $mapper->save($product);
                return $this->_helper->redirector('list', 'product', 'product');
            } else {
                $form->setElementErrors($product->getInputFilter()->getErrors());
            }
        }
        $this->view->form = $form;
    }

    public function deleteAction()
    {
        // action body
    }


}







