<?php
namespace News\Model;

class Category {
	protected  $id;
	protected  $name;
	protected  $position;
	
	public function exchangeArray($data)
	{
		
		$this->id = $data['id'];
		$this->name = $data['name'];
		$this->position = $data['position'];
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getPosition(){
		return $this->position;
	}
	
}
	