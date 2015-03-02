<?php
namespace News;

use News\Model\Post;
use News\Model\PostTable;
use News\Model\DateFormatter;

use Zend\Db\TableGateway\TableGateway;

use News\Model\Category;
use News\Model\CategoryTable;
use Zend\Db\ResultSet\ResultSet;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

 class Module implements AutoloaderProviderInterface, ConfigProviderInterface
 {
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

     public function getConfig()
     {
         return include __DIR__ . '/config/module.config.php';
     }
     
 	public function getServiceConfig()
	{
		return array(
             'factories' => array(
	                'News\Model\CategoryTable' =>  function($sm) {
						$tableGateway = $sm->get('CategoryTableGateway');
				
						$table = new CategoryTable($tableGateway);
						
						return $table;
	                 },
	                 
	                 'CategoryTableGateway' => function ($sm) {

	                 	 $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');

		                 $resultSetPrototype = new ResultSet();
		                
		                 $resultSetPrototype->setArrayObjectPrototype(new Category());
		               
		                 return new TableGateway('categories_dadadada', $dbAdapter, null, $resultSetPrototype);
	                 },
	                 
	                   
	                 'News\Model\CategoryTableFactory' => "News\Model\CategoryTableFactory",
	               
	                
	                 'News\Model\PostTable' =>  function($sm) {
						$tableGateway = $sm->get('PostTableGateway');
				
						$table = new PostTable($tableGateway);
						
						return $table;
	                 },
	                 
	                 'PostTableGateway' => function ($sm) {

	                 	 $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
	                 	 $categoryService = $sm->get('News\Model\CategoryTable');

		                 $resultSetPrototype = new ResultSet();
		                
		                 $resultSetPrototype->setArrayObjectPrototype(new Post($categoryService));
		               
		                 return new TableGateway('posts', $dbAdapter, null, $resultSetPrototype);
	                 },
	                 
	                
	                 
	                
	                 
            ),
            'invokables' => array(
	            // Keys are the service names
	            // Values are valid class names to instantiate.
	            'dateFormater' => 'News\Model\DateFormatter',
	        ),  

	        'aliases' => array(
	            "categoryTable"=>"News\Model\CategoryTable"
	        ),
                
         );
	}
 }