<?php 
namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
    	
    		$blogTable = $this->getServiceLocator()->get("Blog\Model\BlogTable");
    		
    		$posts = $blogTable->fetchAll();
    		
        return array('posts'=>$posts);
    }
}
