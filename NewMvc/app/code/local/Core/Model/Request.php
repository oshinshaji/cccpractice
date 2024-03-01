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
		// echo $this->_controllerName;

	}

	public function getParams($key = '',$arg=null)
	{
		return ($key == '')
			? $_REQUEST
			: (isset($_REQUEST[$key])
				? $_REQUEST[$key]
				: ((!is_null($arg))?$arg:'')
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
		$str="/cybercom_practice/NewMvc/";
		// echo $_SERVER['REQUEST_URI'];
		$uri = str_replace($str, "", $_SERVER['REQUEST_URI']);
		// echo $uri;
		return $uri;
	}

	public function getUrl($path){
		// print_r($_SERVER['SCRIPT_NAME']);
		return 'http://localhost/cybercom_practice/NewMvc/'.$path;
	}

	public function getActionName()
	{  
		// echo $this->_actionName;
		return $this->_actionName;

	}

	public function getControllerName()
	{
		// echo $this->_controllerName;
		return $this->_controllerName;
	}
	public function getModuleName()
	{ 
		// echo $this->_moduleName;
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