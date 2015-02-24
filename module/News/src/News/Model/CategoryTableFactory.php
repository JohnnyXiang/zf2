<?php
namespace News\Model;


class CategoryTableFactory{

	public function __invoke($sm)
	{
		$tableGateway = $sm->get('CategoryTableGateway');

		$table = new CategoryTable($tableGateway);

		return $table;
	}
}
