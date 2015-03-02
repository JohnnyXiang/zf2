<?php
namespace News\Controller;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use News\Model\CategoryTable;
use News\Model\Category;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	public function indexAction()
	{
		$categoryService = $this->getServiceLocator()->get("categoryTable");

		$categories = $categoryService->fetchAll();

		$dateFormatter = $this->getServiceLocator()->get("dateFormater");
		//echo $dateFormatter->getDate(time());

		//$categoryService = $this->getServiceLocator()->get("Album\Model\AblumTable");
		return array('categories'=>$categories);
	}
	
	public function postsAction(){
		$id = (int) $this->params()->fromRoute('categoryid', 0);
		
		$postService = $this->getServiceLocator()->get("News\Model\PostTable");
		
		$posts = $postService->getPostsByCategoryId($id);
		
		return array('posts'=>$posts);
	}
	
	
	
	
}