<?php
// On génère une constante contenant le chemin vers la racine publique du projet
define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));

// On appelle le modèle et le contrôleur principaux
require_once(ROOT.'app/Controller.php');
require_once(ROOT.'app/Model.php');

// On sépare les paramètres et on les met dans le tableau $params
$params = explode('/', $_GET['p']);

// Si au moins 1 paramètre existe
if($params[0] != ""){
    // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
    $controller = ucfirst($params[0]);

if($params[1] != ""){
    $action = strtolower($params[1]);
}else{
     $action = $params[1]='index';
}

    // On appelle le contrôleur
    require_once(ROOT.'controllers/'.$controller.'.php');

    // On instancie le contrôleur
    $controller = new $controller();

    if(method_exists($controller, $action)){
        unset($params[0]);
        unset($params[1]);
        call_user_func([$controller, $action]);
        // On appelle la méthode
         $controller->$action();
         
    }else{
        // On envoie le code réponse 404
        http_response_code(404);
        echo "Not found";
    }
}else{
    // Ici aucun paramètre n'est défini
    // On appelle le contrôleur par défaut
    require_once(ROOT.'controllers/BackOffice.php');

    // On instancie le contrôleur
    $controller = new BackOffice();

    // On appelle la méthode index
    $controller->index();
}
