<?php


class IndexController extends Zend_Controller_Action
{
    public $view;

    public function init()
    {
        Zend_Loader::loadClass('Zend_View');
        $sriptsDir = APPLICATION_PATH. '/views/scripts/index/';
        $this->view = new Zend_View();
        $this->view->setScriptPath($sriptsDir);
    }

    public function indexAction()
    {
        
        $placesFinder = new Application_Model_Places();
        $people =  new Application_Model_People();
        $renderArray = array(
            'title' => $people->getPeople(),
            'places' => $placesFinder->fetchLatest()
        );
        $this->view->assign($renderArray);
        echo( $this->view->render('index.php'));
    }


}

