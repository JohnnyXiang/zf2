<?php
namespace Blog\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
 
class BlogForm extends Form implements InputFilterProviderInterface
{
	public function __construct($name = null)
	{
		// we want to ignore the name passed
		parent::__construct('blog');

		//CSRF protection
		$this->add(array(
		     'type' => 'Zend\Form\Element\Csrf',
		     'name' => 'csrf',
		     'options' => array(
		             'csrf_options' => array(
		                  'timeout' => 600
		             )
		     )
		));
		
		//id field
		$this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
		));
		
		//title field
		$this->add(array(
             'name' => 'title',
             'type' => 'Text',
			 'attributes'=>array(
				'placeholder'=>'Enter the blog title',
				'class'=>'form-control', 
			 ),
             'options' => array(
                 'label' => 'Title',
			),
		));
		
		
		$this->add(array(
             'name' => 'content',
             'type' => 'Textarea',
			 'attributes'=>array(
				'placeholder'=>'Enter the blog content',
				'class'=>'form-control', 
				'rows'=>5
			 ),
             'options' => array(
                 'label' => 'Content',
			),
		));
		
		$this->add(array(
             'name' => 'author',
             'type' => 'Text',
			 'attributes'=>array(
				'placeholder'=>'Enter the blog author',
				'class'=>'form-control', 
			 ),
             'options' => array(
                 'label' => 'Author',
			),
		));
		$this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Submit',
                 'id' => 'submitbutton',
			),
		));
	}
	


     public function getInputFilterSpecification()
     {
         return array(
         
         	'id' => array(
                
                 'required' => false,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ),

            'author'=>array(

                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ),

             'title'=>array(
                 
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ),
             
             'content'=>array(
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 )
             )
         );

          
     }
}