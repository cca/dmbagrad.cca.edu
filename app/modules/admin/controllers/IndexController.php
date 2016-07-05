<?php

class IndexController extends Controller
{

	public function always()
	{
		if (!Sili::$model->user->isAuth() && $this->controllerId != 'LoginController') 
			return Sili::$app->application->redirect('/admin/login');
		
		if (Sili::$app->request->get('logout')) {
			Sili::$app->session->set('auth', false);
			return Sili::$app->application->redirect('/admin');
		}
	}

}