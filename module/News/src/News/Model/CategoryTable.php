<?php 
namespace News\Model;
use DomainException;
use InvalidArgumentException;
use Traversable;
use Zend\Stdlib\ArrayUtils;

use Application\Model\TableAbstract;
use Zend\Db\TableGateway\TableGateway;

class CategoryTable{
	
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	
	function fetchAll() {
		return $this->tableGateway->select();
	}
	
	function getById($id) {
		
		$sql = $this->tableGateway->getSql();
		
		$select = $sql->select();
		
		$select->where(array('id'=>$id));
		
		$resultSet = $this->tableGateway->selectWith($select);
		
		if(count($resultSet) < 1 ){
			throw new \Exception("New category found in db");
		}
		
		return $resultSet->current();
	}
	
	
}
