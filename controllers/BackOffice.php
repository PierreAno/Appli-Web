<?php

class BackOffice extends Controller{

	public function index(){
		// Instantiate the "Auth" model
        $this->loadModel('Auth');

        // Data is stored in $auth
        $auth = $this->Auth->isloged();

        $this->render('index', compact('auth'));     
	}

	public function management(){
		// Instantiate the "Auth" model
        $this->loadModel('Auth');

        // Data is stored in $auth
        $auth = $this->Auth->isloged();

        // Data is sent to the management view
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