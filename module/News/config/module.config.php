<?php 

return array(
     'controllers' => array(
         'invokables' => array(
             'News\Controller\Index' => 'News\Controller\IndexController',
         ),
     ),

     // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'new_home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/categories',
                    'defaults' => array(
                        'controller' => 'News\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            
            'category_post' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/category[/:categoryid]/posts',
                     'constraints' => array(
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'News\Controller\Index',
                         'action'     => 'posts',
                     ),
                 ),
             ),
         ),
     ),

     'view_manager' => array(
         'template_path_stack' => array(
             'news' => __DIR__ . '/../view',
         ),
     ),
 );
 
