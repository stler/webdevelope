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
 			Routing::run($request);
		}
		
	}
?>