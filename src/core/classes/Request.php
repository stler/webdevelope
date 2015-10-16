<?php
	namespace src\core\classes;
	class Request
	{
		private $controller;
		private $action;
		private $params = array();
		
		function __construct()
		{
			$url = $_SERVER["REQUEST_URI"];
			$exploded_url = explode('/', $url);
			$this->controller = $exploded_url[2];
			$this->action = $exploded_url[3];
			for($i = 4; $i < sizeof($exploded_url); $i++)
				if($exploded_url[$i] )
				$this->params["GET"][] = $exploded_url[$i];
		}

		function getGetParams()
		{
			return $this->params["GET"];
		}

		function getPostParams()
		{
			if(!isset($this->params["POST"]))
			{
				$this->params["POST"] = array();
				$this->params["POST"] = $_POST;
			}
			return($this->params["POST"]);
		}

		function getParams()
		{
			return $this->params;
		}

		function getParam($i)
		{
			return $this->params["GET"][$i];
		}

		function getAction()
		{
			return $this->action;
		}

		function getController()
		{
			return $this->controller;
		}
		//напсать getParam и getParams

	}
?>