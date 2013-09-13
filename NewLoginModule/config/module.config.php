<?php
return array(
    'controllers'=> array(
        'invokables'=> array(
            'NewLoginModule\Controller\NewLoginModule'=>'NewLoginModule\Controller\NewLoginModuleController',
        ),
    ),
    'router'=>array(
        'routes'=>array(
            'login'=>array(
                'type'=>'segment',
                'options'=>array(
                    'route'=>'/login/index[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                        ),
                    'defaults' => array(
                        'controller' => 'NewLoginModule\Controller\NewLoginModule',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'newLoginModule' => __DIR__ . '/../view',
        ),
    ),
);