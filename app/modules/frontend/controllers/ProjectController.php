<?php

class ProjectController extends IndexController
{

	public function actionIndex()
	{
		return Sili::$app->application->redirect('/');
	}

	public function actionView(){
		
		$project = Sili::$model->projects->getProject(Sili::$app->request->get('id', false));

		$this->pageTitle = 'Test application';

		$this->render = ['project', ['project' => $project]];

	}

}






