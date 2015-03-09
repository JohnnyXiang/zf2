<?php
namespace Blog\Model;

class Blog {
	protected $id;
	protected $title;
	protected $author;
	protected $content;
	protected $time_created;	
	
	public function exchangeArray($data)
	{
		//var_dump($data);
		$this->id = $data['id'];
		$this->title = $data['title'];
		$this->author = $data['author'];
		$this->content = $data['content'];
		$this->time_created = $data['time_created'];
	}
	
	public function getId(){
		return $this->id;
	}
	
	/**
	 * set the id for the blog object
	 * @param int $id
	 */
	public function setId($id){
		$this->id = $id;
		return $this;
	}
	
	public function getTitle(){
		return $this->title;
	}
	public function getAuthor(){
		return $this->author;
	}
	
	function getContent(){
		return $this->content;
	}
	
	function getTimeCreated(){
		return $this->time_created;
	}
}
	