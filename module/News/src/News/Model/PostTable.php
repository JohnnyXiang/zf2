<?php 
namespace News\Model;
use DomainException;
use InvalidArgumentException;
use Traversable;
use Zend\Stdlib\ArrayUtils;

use Application\Model\TableAbstract;
use Zend\Db\TableGateway\TableGateway;

class PostTable{
	
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	
	function fetchAll() {
		return $this->tableGateway->select();
	}
	
	
	function getPostsByCategoryId($categoryId){
		$select = $this->tableGateway->getSql()->select();
		
		if($categoryId != 0 ){
			$select->where(array(
				"category_id"=>array(3,4,5),
				//"id"=>$id
			));
			
			
		}
		$select->order('category_id desc');
		$select->order('time_created desc');
		
		$select->limit(2);
		$select->offset(1);
		
		//echo $select->getSqlString();
		
		return $this->tableGateway->selectWith($select);
	}
	
	
	
}
