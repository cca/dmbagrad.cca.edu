<?php

class MainController extends IndexController
{

	public function actionIndex()
	{
		$this->pageTitle = 'Test application';

		$filter = Sili::$app->request->get('filter', false);

		$filter['deleted'] = false;

		$projects = Sili::$model->projects->getProjects($filter);

		$this->render = ['main', ['projects' => $projects]];

	}

}






