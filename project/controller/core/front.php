<?php

require_once 'Model/Core/Request.php';

class Controller_Core_Front
{
	protected $request = null;

	public function setRequest($request)
	{
		$this->request = $request;
		return $this;
	}

	public function getRequest()
	{
		if ($this->request) {
			return $this->request;
		}

		$request = new Model_Core_Request();
		$this->setRequest($request);
		return $request;
	}

	public function init()
	{
		$request = $this->getRequest();
		$controllerName = $request->getControllerName();
		$controllerClassName = 'Controller_'.ucwords($controllerName,'_');
		$controllerClassPath = str_replace('_', '/', $controllerClassName);
		require_once "{$controllerClassPath}.php";
		$controller = new $controllerClassName();
		$actionName = $request->getActionName().'Action';
		if (method_exists($request, $actionName)) {
			throw new Exception("{$actionName} doesnot exists.", 1);
			
		}
		$controller->$actionName();
        
	}

}

?>