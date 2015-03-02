<?php 
namespace Blog\Model;

use Zend\Db\TableGateway\TableGateway;
class BlogTable{
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	
	public function fetchAll(){
		//$resultSet = $this->tableGateway->select();
		$select = $this->tableGateway->getSql()->select();
		
		$select->order('id desc');
		
		return $this->tableGateway->selectWith($select);
	}
	
	public function saveBlog(){
		
	}
	
	public function deleteBlog(){
		
	}
}
