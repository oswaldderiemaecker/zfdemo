<?php

class Product_Form_Product extends In2it_Form
{

    public function init()
    {
        $this->setDecorators(array (
            'FormElements',
            'HtmlTag',
            'Form',
        ));
        $this->addAttribs(array (
            'role' => 'form'
        ));
        $this->addElement('text', 'title', array (
            'Label' => 'Product title',
            'Required' => true,
            'class' => 'form-control',
            'attribs' => array (
                'placeholder' => 'e.g. Pack of cookies',
            ),
            'decorators' => array (
                'ViewHelper',
                'Description',
                'Errors',
                array(array('data' => 'HtmlTag'), array('tag' => 'span', 'class' => 'element')),
                array('Label', array('tag' => 'span')),
                array(array('row' => 'HtmlTag'), array('tag' => 'div', 'class' => 'form-group')),
            ),
        ));
        $this->addElement('textarea', 'description', array (
            'Label' => 'Details',
            'Required' => false,
            'class' => 'form-control',
            'attribs' => array (
                'rows' => 12,
            ),
            'decorators' => array (
                'ViewHelper',
                'Description',
                'Errors',
                array(array('data' => 'HtmlTag'), array('tag' => 'span', 'class' => 'element')),
                array('Label', array('tag' => 'span')),
                array(array('row' => 'HtmlTag'), array('tag' => 'div', 'class' => 'form-group')),
            ),
        ));
        $this->addElement('text', 'image', array (
            'Label' => 'Image location',
            'Required' => true,
            'class' => 'form-control',
            'attribs' => array (
                'placeholder' => 'http://www.example.com/images/my_image.jpg',
            ),
            'decorators' => array (
                'ViewHelper',
                'Description',
                'Errors',
                array(array('data' => 'HtmlTag'), array('tag' => 'span', 'class' => 'element')),
                array('Label', array('tag' => 'span')),
                array(array('row' => 'HtmlTag'), array('tag' => 'div', 'class' => 'form-group')),
            ),
        ));
        $this->addElement('text', 'price', array (
            'Label' => 'Product price',
            'Required' => true,
            'class' => 'form-control',
            'attribs' => array (
                'placeholder' => '259.95',
            ),
            'decorators' => array (
                'ViewHelper',
                'Description',
                'Errors',
                array(array('data' => 'HtmlTag'), array('tag' => 'span', 'class' => 'element')),
                array('Label', array('tag' => 'span')),
                array(array('row' => 'HtmlTag'), array('tag' => 'div', 'class' => 'form-group')),
            ),
        ));
        $this->addElement('submit', 'save', array (
            'Label' => 'Save this product',
            'Ignore' => true,
            'class' => 'btn btn-primary',
            'Decorators' => array (
                'ViewHelper',
                array ('HtmlTag', array ('tag' => 'div')),
            ),
        ));

        $this->addElement('hidden', 'id', array (
            'decorators' => array (
                'ViewHelper',
            ),
        ));
        $this->addElement('hidden', 'hash', array (
            'decorators' => array (
                'ViewHelper',
            ),
        ));
    }


}

