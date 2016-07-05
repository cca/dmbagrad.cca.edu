<?php

class ProjectController extends IndexController
{

	public function actionIndex()
	{
		return Sili::$app->application->redirect('/admin');
	}

	public function actionEdit(){
		
		$project = Sili::$model->projects->getProject(Sili::$app->request->get('id', false));

		$this->pageTitle = 'View project';

		$this->render = ['edit', ['project' => $project]];

	}
	public function actionToogle(){
		
		$status = Sili::$model->projects->toogle(Sili::$app->request->get('id', false));
		$to = $status?'/trash':'';
		return Sili::$app->application->redirect('/admin'.$to);
	}



}






