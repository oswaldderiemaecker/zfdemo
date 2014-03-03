<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initView()
    {
        // Initialize view
        if (null !== $this->getPluginResource('view')) {
            $view = $this->getPluginResource('view')->getView();
        } else {
            $view = new Zend_View();
        }
        $view->headMeta()->setHttpEquiv(
            'Content-Type', 'text/html; Charset=UTF-8'
        );
        $view->headTitle('Demo Application');
        $view->headTitle()->setSeparator(' | ');
        $view->headLink()
            ->appendStylesheet($view->baseUrl('/css/bootstrap.min.css'))
            ->appendStylesheet($view->baseUrl('/css/bootstrap-theme.min.css'))
            ->appendStylesheet($view->baseUrl('/css/style.css'));
        $view->headScript()
            ->appendFile($view->baseUrl('/js/jquery-1.11.0.min.js'))
            ->appendFile($view->baseUrl('/js/bootstrap.min.js'));

        // Add it to the ViewRenderer
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
            'ViewRenderer'
        );
        $viewRenderer->setView($view);

        // Return it, so that it can be stored by the bootstrap
        return $view;
    }
}

