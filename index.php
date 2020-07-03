<?php
// A constant is generated containing the path to the public root of the project
define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));

// The master model and controller is called
require_once(ROOT.'app/Controller.php');
require_once(ROOT.'app/Model.php');

// Separate the parameters and put them in the $params array
$params = explode('/', $_GET['p']);

// If at least 1 parameter exists
if($params[0] != ""){
    // Save the 1st parameter in $controller by capitalizing its 1st letter
    $controller = ucfirst($params[0]);

    if($params[1] != ""){
        $action = strtolower($params[1]);
    }else{
         $action = $params[1]='index';
    }

    // The controller is called
    require_once(ROOT. 'controllers/'.$controller. '.php');

    // The controller is instantiated
    $controller = new $controller();

    if(method_exists($controller, $action)){
        unset($params[0]);
        unset($params[1]);
        call_user_func([$controller, $action]);
        // The method is called         
        $controller->$action();
         
    }else{
        // Reply code 404 is sent
        http_response_code(404);
        echo "Not found";
    }
}else{
    // Here no parameter is defined
    // The default controller is called
    require_once(ROOT. 'controllers/Frontoffice.php ');
    
    // The controller is instantiated
    $controller = new Frontoffice();

    // The index method is called
    $controller->index();
}
