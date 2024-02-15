<?php

class Core_Model_Request
{

	protected $_moduleName;
	protected $_controllerName;
	protected $_actionName;

	public function __construct()
	{
		$uri = $this->getRequestUri();
		$uri = explode("?", $uri);
		$uri = array_filter(explode("/", $uri[0]));
		$this->_moduleName =     isset($uri[0]) ? $uri[0] : 'page';
		$this->_controllerName = isset($uri[1]) ? $uri[1] : 'index';
		$this->_actionName =     isset($uri[2]) ? $uri[2] : 'index';

	}

	public function getParams($key = '')
	{
		return ($key == '')
			? $_REQUEST
			: (isset($_REQUEST[$key])
				? $_REQUEST[$key]
				: ''
			);
	}

	public function getPostData($key = '')
	{
		return ($key == '')
			? $_POST
			: (isset($_POST[$key])
				? $_POST[$key]
				: ''
			);
	}

	public function getQueryData($key = '')
	{
		return ($key == '')
			? $_GET
			: (isset($_GET[$key])
				? $_GET[$key]
				: ''
			);
	}

	public function isPost()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			return true;
		}
		return false;
	}

	public function getRequestUri()
	{
		$uri = str_replace("/cybercom_practice/NewMvc/", "", $_SERVER['REQUEST_URI']);
		return $uri;
	}

	public function getActionName()
	{
		return $this->_actionName;

	}

	public function getControllerName()
	{
		return $this->_controllerName;
	}
	public function getModuleName()
	{
		return $this->_moduleName;
	}

	public function getFullControllerClass()
	{
		$fullControllerClass = $this->_moduleName . '_Controller_' . $this->_controllerName;
		$fullControllerClass = ucwords($fullControllerClass, "_");
		return $fullControllerClass;
	}
}


?>