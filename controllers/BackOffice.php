<?php

class BackOffice extends Controller{

	public function index(){
        $this->render('index');     
	}

	public function management(){
		// On instancie le modèle "Auth"
        $this->loadModel('Auth');

        // On stocke la liste des articles dans $auth
        $auth = $this->Auth->isloged();

        // On envoie les données à la vue management
        $this->render('management', compact('auth'));
	}

	public function doCreate(){
        $this->render('doCreate'); 
	}

	public function doModify(){
        $this->render('doModify'); 
	}

	public function doDelete(){
        $this->render('doDelete'); 
	}

	public function viewReview(){
    	$this->render('viewReview');
	}
}