<?php
	namespace src\core\classes;
	class FrontController
	{
		function bootstrapt()
		{
			return $this;
		}
		
		function hahdlerRequest()
		{
 			$request = new Request();
			$config = new Config();
 //			Routing::run($request);
		}
		
	}
?>