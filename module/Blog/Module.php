<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Blog;

use Zend\Db\TableGateway\TableGateway;

use Zend\Db\ResultSet\ResultSet;

use Blog\Model\Blog;

use Blog\Model\BlogTable;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
class Module implements ConfigProviderInterface
{
    

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    
	public function getServiceConfig()
	{
		return array(
             'factories' => array(
		
					'BlogTableGateway' => function ($sm) {
	                 	 $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
		                 $resultSetPrototype = new ResultSet();
		                
		                 $resultSetPrototype->setArrayObjectPrototype(new Blog());
		             
		                 return new TableGateway('blog_posts', $dbAdapter, null, $resultSetPrototype);
	                 },
	                 
	                'Blog\Model\BlogTable' =>  function($sm) {
						$tableGateway = $sm->get('BlogTableGateway');
				
						$table = new BlogTable($tableGateway);
						
						return $table;
	                 },
	                 
	                 
	                 
	                   
	                 
	                
	                 
	                
	                 
            ),
           
                
         );
	}
}
