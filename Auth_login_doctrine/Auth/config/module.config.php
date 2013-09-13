<?php


return array(
'doctrine' => array(
  'driver' => array(
    'application_entities' => array(
      'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
      'cache' => 'array',
      'paths' => array(__DIR__ . '/../src/Auth/Entity')
    ),

    'orm_default' => array(
      'drivers' => array(
        'Auth\Entity' => 'application_entities'
      )
))),
        'controllers' => array(
                'invokables' => array(
                    'Auth\Controller\Auth' => 'Auth\Controller\AuthController',
                              ),
                            ),
// The following section is new and should be added to your file
'router' => array(
    'routes' => array(
        'auth' => array(
            'type'    => 'segment',
                'options' => array(

                    'route'    => '/auth[/][:action][/:id]',
                        'constraints' => array(
                            'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            'id'     => '[0-9]+',
                                            ),
                            'defaults' => array(
                            'controller' => 'Auth\Controller\Auth',
                            'action'     => 'login',
                                            ),

                                    ),
                            ),
                        ),

                ),



        'view_manager' => array(
            'template_path_stack' => array(
                'album' => __DIR__ . '/../view',
                                ),
                                            ),

);
