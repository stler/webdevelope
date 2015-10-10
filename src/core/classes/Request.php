<?php
	class Request
	{
		private $protocol;
		private $host;
		private $controller;
		private $action;
		private $params = array();
		
		function __construct()
		{
			
			$url = $_SERVER["REQUEST_URI"];
			$exploded_url = explode('/', $url);
			$this->protocol = $exploded_url[0];
			$this->host = $exploded_url[1];
			$this->controller = $exploded_url[2];
			$this->action = $exploded_url[3];
			for($i = 4; $i < sizeof($exploded_url); $i++)
				$this->params[] = $exploded_url[$i];
		}

		//напсать getParam и getParams

	}
?>