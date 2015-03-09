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
            
           'add_post' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/blog/add',
                    'defaults' => array(
                        'controller' => 'Blog\Controller\Post',
                        'action'     => 'add',
                    ),
                ),
            ),
             
           'view_post' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/blog/view/[:post_id]',
            			'constraints'=>array(
            			'id'=>'[0-9]+'
            		),
                'defaults' => array(
                        'controller' => 'Blog\Controller\Post',
                        'action'     => 'view',
                    ),
                ),
            ),
            
            'edit_post' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/blog/edit/[:post_id]',
            			'constraints'=>array(
            			'id'=>'[0-9]+'
            		),
                'defaults' => array(
                        'controller' => 'Blog\Controller\Post',
                        'action'     => 'edit',
                    ),
                ),
            ),
            
            'delete_post' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/blog/delete/[:post_id]',
            			'constraints'=>array(
            			'id'=>'[0-9]+'
            		),
                'defaults' => array(
                        'controller' => 'Blog\Controller\Post',
                        'action'     => 'delete',
                    ),
                ),
            ),
            
           
        ),
    ),
    
    'controllers' => array(
        'invokables' => array(
            'Blog\Controller\Index' => 'Blog\Controller\IndexController',
    		'Blog\Controller\Post' => 'Blog\Controller\PostController'
        ),
    ),
    
   'view_manager' => array(
         'template_path_stack' => array(
             'blog' => __DIR__ . '/../view',
         ),
     ),
   
);
