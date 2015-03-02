<?php
return array(
    'router' => array(
        'routes' => array(
            'blog_home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/blog',
                    'defaults' => array(
                        'controller' => 'Blog\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
           
        ),
    ),
    
    'controllers' => array(
        'invokables' => array(
            'Blog\Controller\Index' => 'Blog\Controller\IndexController'
        ),
    ),
    
   'view_manager' => array(
         'template_path_stack' => array(
             'blog' => __DIR__ . '/../view',
         ),
     ),
   
);
