<?php

class TrashController extends IndexController
{

	public function actionIndex()
	{
		$this->pageTitle = 'Trash'; 

		$projects = Sili::$model->projects->getProjects(['deleted' => 1]);
		
		$this->render = ['main', ['projects' => $projects]];
	}

}