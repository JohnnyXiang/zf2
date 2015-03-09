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
	
	public function getBlog($id){
		
		$resultSet = $this->tableGateway->select(array('id'=>$id));
		
		if(count($resultSet) < 1 ){
			throw new Exception("No blog post found in database.");
		}
		
		return $resultSet->current();
	}
	
	public function saveBlog(Blog $blog){
		
		$data = array(
			'title'=>$blog->getTitle(),
			'content'=>$blog->getContent(),
			'author'=>$blog->getAuthor()
		);
		
		if ($blog->getId()){
			$this->tableGateway->update($data,array("id"=>$blog->getId()));
		}else{
			$this->tableGateway->insert($data);
			$id = $this->tableGateway->lastInsertValue;
			
			$blog->setId($id);
		}
		
		return $blog;
	}
	
	public function deleteBlog(Blog $blog){
		return $this->tableGateway->delete(array("id"=>$blog->getId()));
	}
}
