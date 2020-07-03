<?php

class FrontOffice extends Controller{

    public function index(){
        $this->render('index');
	}

	public function doLogin(){
        $this->render('doLogin');
	}

	public function review(){
        $this->render('review');
	}

	public function doInsert(){
        $this->render('doInsert');
	}
}