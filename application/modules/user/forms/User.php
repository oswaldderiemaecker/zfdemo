<?php

class User_Form_User extends In2it_Form
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
        $this->addElement('text', 'name', array (
            'Label' => 'Your name',
            'Required' => true,
            'class' => 'form-control',
            'attribs' => array (
                'placeholder' => 'e.g. John Doe',
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
        $this->addElement('text', 'email', array (
            'Label' => 'Your email',
            'Required' => true,
            'class' => 'form-control',
            'attribs' => array (
                'placeholder' => 'e.g. john.doe@example.com',
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
        $this->addElement('password', 'password', array (
            'Label' => 'Your password',
            'Required' => true,
            'class' => 'form-control',
            'attribs' => array (
                'placeholder' => 'e.g. MyV3rRyD1ff1cuLTP@ss#rd!',
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
            'Label' => 'Save this user',
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

