<?php

namespace src\core\classes;


class Routing
{
	public static function run(Request $request){
        $nameController = $request->getController(). "Controller";
        $action = $request->getAction();
        $filePath = "src/controller/". $nameController. ".php";
        $className = $nameController;

        if(file_exists($filePath)){
            require_once($filePath);
            $controller = new $nameController;
            if(class_exists($className)){
                $controller = new $nameController();
                if(method_exists($controller, $action)){
                    call_user_func(array($controller, $action));
                }
                else{
                    var_dump("This action not exist!");
                }
            }

        } else{
            die("Controller don't exist");
        }

	}

}