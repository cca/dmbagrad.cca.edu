<?php

class LoginController extends IndexController
{

	public function actionIndex()
	{

		$this->layout = 'login';

		if (Sili::$model->user->isAuth()) 
			return Sili::$app->application->redirect('/admin/main');

		$message = false;
		if (Sili::$app->request->post()){
			if (Sili::$model->user->signin(Sili::$app->request->post())) {
				Sili::$app->application->redirect('/admin/main');
			}else
				$message = ['status' => 'error', 'body' => 'Error'];
		} 
	
		
		$this->render = ['login', ['message' => $message]];
	}

}