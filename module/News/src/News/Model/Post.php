<?php
namespace News\Model;

class Post {
	const STATUS_PUBLISHED = 1;
	const STATUS_PENDING = 0;
	
	protected  $id;
	protected  $title;
	protected  $content;
	protected $author;
	protected $status;
	protected $category;
	protected $categoryService;
	
	
	public function __construct(CategoryTable $categoryService){
		$this->categoryService = $categoryService;
	}
	
	public function exchangeArray($data)
	{
		
		$this->id = $data['id'];
		$this->title = $data['title'];
		$this->content = $data['content'];
		$this->author = $data['author'];
		$this->status = $data['status'];
		$this->category = $this->categoryService->getById($data['category_id']);
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function getContent(){
		return $this->content;
	}
	
	public function getAuthor(){
		return $this->author;
	}
	
	public function getStatus(){
		return $this->status;
	}
	
	public function getReadableStatus(){
		return $this->status==self::STATUS_PUBLISHED ? "Published":"Pending";
	}
	
	public function getCategoryName(){
		return $this->category->getName();
	}
	
}
	