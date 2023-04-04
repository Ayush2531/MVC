<?php


class Model_PaymentMethod extends Model_Core_Table
{
	function __construct()
	{
		parent::__construct();
		
		$this->setTableName('payment_method')->setPrimaryKey('payment_method_id');
	}
}

?>