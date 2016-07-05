<?php

class IndexController extends Controller
{

	public function always(){
		
	}

	public function isError($code = false){
		$this->render = ['404'];
	}

}