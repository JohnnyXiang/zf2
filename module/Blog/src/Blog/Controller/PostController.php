<?php
/**
 *
 * Enter description here ...
 * @author xiuqiangxiang
 * @copyright:
 *
 *
 */
namespace Blog\Controller;

use Blog\Form\BlogForm;

use Blog\Model\Blog;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PostController extends AbstractActionController
{
	protected $blog;

	function _initPost($id=null){
		if($id == null){
			$id = $this->params()->fromRoute('post_id',0);
		}

		if ($id < 1) {
			$this->blog = new Blog();
		} else {

			$blogTable = $this->getServiceLocator()->get("Blog\Model\BlogTable");
			$blog = $blogTable->getBlog($id);

			$this->blog = $blog;
		}
	}

	/*
	 * action to add a post
	 */
	public function addAction(){
		$form = new BlogForm();
		
		if($this->getRequest()->isPost()){
			$this->_initPost();
			$this->saveBlogFromPost($form);
		}
		
		return array('form' => $form);
	}

	/**
	 * 
	 * Save the blog after user submission
	 */
	protected function saveBlogFromPost($form){
		$data = $this->getRequest()->getPost();
			//@todo: validate the data
		$form->setData($data);

        if ($form->isValid()) {
			
			$this->blog->exchangeArray($form->getData());
			$blogTable = $this->getServiceLocator()->get("Blog\Model\BlogTable");
			$this->blog = $blogTable->saveBlog($this->blog);
				
			if($id = $this->blog->getId()){
				$this->redirect()->toRoute('blog_home');
			}
        }else{
        	
        }
	}
	public function viewAction()
	{
		try{
			$this->_initPost();	
			if (! is_int($this->blog->getId()) ){
				throw new \Exception("No blog found");
			}
				
			return array(
    				'blog'=>$this->blog
			);

		}catch (\Exception $e){
			//todo: add error handling functions.
		}

	}

	public function editAction()
	{
		try{

			$this->_initPost();
			
			if($this->getRequest()->isPost()){
				$this->saveBlogFromPost();
			}
			
			if(!$this->blog->getId()){
				$this->redirect()->toRoute('blog_home');
			}
			
			return array(
    				'blog'=>$this->blog
			);

		}catch (Exception $e){
			//todo: add error handling functions.
		}

	}
	
	public function deleteAction(){
		$this->_initPost();
		$blogTable = $this->getServiceLocator()->get("Blog\Model\BlogTable");
		$blogTable->deleteBlog($this->blog);
		$this->redirect()->toRoute('blog_home');
	}


}
