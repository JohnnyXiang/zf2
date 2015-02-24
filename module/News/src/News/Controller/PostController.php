<?php
namespace News\Controller;

use Zend\Db\TableGateway\TableGateway;

use Zend\Db\ResultSet\ResultSet;

use News\Model\CategoryTable;

use News\Model\Category;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PostController extends AbstractActionController
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
	
	
}