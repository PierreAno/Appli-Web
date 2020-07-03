<?php
abstract class Controller{

    public function render(string $fichier, array $data = []){
        extract($data);

        if (strtolower(get_class($this)) == "frontoffice"){
            // Start the output buffer
            ob_start();

            // We generate the view
            require_once(ROOT.'views/'.strtolower(get_class($this)).'/'.$fichier.'.php');

            // Content is stored in $content
            $content = ob_get_clean();

            // We manufacture the "template"
            require_once(ROOT.'views/layout/default1.php');

        }else{
            // Start the output buffer
            ob_start();

            // We generate the view
            require_once(ROOT.'views/'.strtolower(get_class($this)).'/'.$fichier.'.php');

            // Content is stored in $content
            $content = ob_get_clean();

            // We manufacture the "template"
            require_once(ROOT.'views/layout/default.php');
        }
    }

    public function loadModel(string $model){
        // We will look for the file corresponding to the desired model
        require_once(ROOT.'models/'.$model.'.php');
        
       // An instance of this template is created. Thus "Model" will be accessible by $this->Model
        $this->$model = new $model();
    }
}