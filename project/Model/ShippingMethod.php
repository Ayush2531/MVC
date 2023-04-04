<?php


class Model_ShippingMethod extends Model_Core_Table
{
	function __construct()
	{
		parent::__construct();
		
		$this->setTableName('shipping_method')->setPrimaryKey('shipping_method_id');
	}
}

?>