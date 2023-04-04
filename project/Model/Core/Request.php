<?php

class Model_Core_Request
{
	public function getPost($key=null,$value=null)
	{
		if($key == null)
		{
			return $_POST;
		}
		if (array_key_exists($key, $_POST) ) 
		{
			return $_POST[$key];
		}

		return $value;
	}

	public function isPost()
	{
		if ($_SERVER['REQUEST_METHOD'] != "POST") {
			return false;
		}

		return True;

	}


	public function getParam($key = null,$value=null)
	{
		if($key==null)
		{
			return $_GET;

		}
		if(array_key_exists($key, $_GET))
		{
			return $_GET[$key];
		 }
		 return $value;
	
	}
	

	public function getactionName()
	{
		return $this->getParam('a','index');
	}

	public function getControllerName()
	{
		return $this->getParam('c','index');
	}



	public function geturl($c=null ,$a=null, $parameter=null)
	{

	}
}


?>