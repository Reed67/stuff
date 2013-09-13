<?php
namespace NewLoginModule;

use NewLoginModule\Model\NewLoginModule;
use NewLoginModule\Model\NewLoginModuleTable;
use Zend\Authentication\AuthenticationService;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
        'Zend\Loader\ClassMapAutoloader' => array(__DIR__ . '/autoload_classmap.php'),
        'Zend\Loader\StandardAutoloader' => array(
        'namespaces' => array(__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__)));
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'NewLoginModule\Model\NewLoginModuleTable' => function ($sm)
                {
                    $tableGateway = $sm->get('NewLoginModuleTableGateway');
                    $table = new NewLoginModuleTable($tableGateway);
                    return $table;
                },
                'NewLoginModuleTableGateway' => function ($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new NewLoginModule());
                    return new TableGateway('User', $dbAdapter, null, $resultSetPrototype);
                },
                'LoginAuthStorage' => function($sm){
                    return new \NewLoginModule\Model\LoginAuthStorage();
                },
                'AuthService' => function ($sm)
                {
                    $dbAdapter           = $sm->get('Zend\Db\Adapter\Adapter');
                    $dbTableAuthAdapter  = new DbTableAuthAdapter($dbAdapter,'User','login','password');

                    $authService= new AuthenticationService();
                    $authService->setAdapter($dbTableAuthAdapter);
                    $authService->setStorage($sm->get('LoginAuthStorage'));
                    return $authService;

                },
               ),
           );
    }
}