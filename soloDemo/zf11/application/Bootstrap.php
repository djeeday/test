<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function __construct($application)
    {
        parent::__construct($application);

        if ($application->hasOption('resourceloader')) {
            $this->setOptions(
                array(
                    'resourceloader' => $application->getOption(
                        'resourceloader'
                    )
                )
            );
        }
        $this->getResourceLoader();

        if (!$this->hasPluginResource('FrontController')) {
            $this->registerPluginResource('FrontController');
        }
        //set locale to ukrainian
        $locale = new Zend_Locale('uk_UA');
        Zend_Registry::set('Zend_Locale', $locale);
        date_default_timezone_set('Europe/Kiev');
        //load local config
        $config = new Zend_Config_Ini(APPLICATION_PATH.'/configs/application.ini','testing');
        Zend_Registry::set('config',$config);
        //Connect to DB
        $params = array(
            'host' => $config->database->host,
            'username' => $config->database->username,
            'password' => $config->database->password,
            'dbname' => $config->database->dbname
        );
        $db = Zend_Db::factory($config->adapter,$params);
        Zend_Registry::set('db',$db);
        Zend_Db_Table::setDefaultAdapter($db);
        $autoloader = Zend_Loader_Autoloader::getInstance();
        
    }
    public function run()
    {
        

        $front   = $this->getResource('FrontController');
        $default = $front->getDefaultModule();
        if (null === $front->getControllerDirectory($default)) {
            throw new Zend_Application_Bootstrap_Exception(
                'No default controller directory registered with front controller'
            );
        }
        $front->setParam('bootstrap', $this);
        $front->setParam('throwexceptions',true);
        $response = $front->dispatch();
        if ($front->returnResponse()) {
            return $response;
        }
    }

}

