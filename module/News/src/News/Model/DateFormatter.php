<?php 
namespace News\Model;

class DateFormatter {
	protected $timestamp;
	
	function __construct(){
		$this->timestamp = time();
	}
	function getDate($timestamp = null){
		if($timestamp!= null){
			$this->timestamp = $timestamp;
		}
		return date("M,d Y",$this->timestamp);
	}
}