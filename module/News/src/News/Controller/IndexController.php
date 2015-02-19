<?php
namespace News\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	public function indexAction()
	{
		
		$categoryService = $this->getServiceLocator()->get("News\Model\CategoryTable");
		
		$categories = $categoryService->fetchAll();
		
		return array('categories'=>$categories);
	}
}