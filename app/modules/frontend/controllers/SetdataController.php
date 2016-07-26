<?php

class SetdataController extends IndexController
{

	public function actionIndex()
	{
		$start = 0;
		$results = [];
		while ($data = json_decode(file_get_contents('http://libraries.cca.edu/dmba/?length=50&start='.$start))->results ) {
			$results = array_merge($results, $data);
			$start = $start + 50;
		}

		$strategicForesight = json_decode(file_get_contents('http://libraries.cca.edu/strategic-foresight'))->results;

		$datas = [
			'strategicForesight' => $strategicForesight,
			'designStartegy' => $results
		];
		
		foreach ($datas as $type => $dataValues) {



			$updateResults = [];
			foreach ($dataValues as $value) {
				$projectTemp = Sili::$db->get('projects', '*', ['mongoId' => $value->id]);
				if ($projectTemp && $value->modifiedDate != $projectTemp['lastModify']) {
					$updateResults[] = $value;
					Sili::$db->delete('project', ['mongoId' => $value->id]);
					$attachments = Sili::$db->select('attachments', ['project_id' => $projectTemp['id']]);
					Sili::$db->delete('attachments', ['project_id' => $projectTemp['id']]);
					if ($attachments) {
						foreach ($attachments as $at) {
							Sili::$db->delete('links', ['attach_id' => $at['id']]);
						}
					}
						
				}elseif(!$projectTemp){
					if (trim($value->course) == 'Venture Studio' || trim($value->course) == 'Foresight Venture Studio') {
						$updateResults[] = $value;
					}
				}
			}


			if ($updateResults) {
				foreach ($updateResults as $project) {
					$projectId = Sili::$db->insert('projects', [
						'lastModify' => $project->modifiedDate,
						'mongoId' => $project->id,
						'courseName' => $project->courseName,
						'facultyID' => $project->facultyID,
						'name' => $project->name,
						'description' => $project->description,
						'link' => $project->link,
						'students' => $project->students,
						'semester' => $project->semester,
						'course' => $project->course,
						'faculty' => $project->faculty,
						'section' => $project->section,
						'dataType' => $type
					]);	
					if ($project->attachments) {
						foreach ($project->attachments as $attach) {
							$attachId = Sili::$db->insert('attachments', [
								'project_id' => $projectId,
								'type' => $attach->type,
								'description' => $attach->description,
								'viewer' => $attach->viewer,
								'preview' => $attach->preview,
								'restricted' => $attach->restricted,
								'thumbnail' => $attach->thumbnail,
								'filename' => $attach->filename,
								'size' => $attach->size,
								'conversion' => $attach->conversion,
								'thumbFilename' => $attach->thumbFilename
							]);
							Sili::$db->insert('links', [
								'attach_id' => $attachId,
								'view' => $attach->links->view,
								'thumbnail' => $attach->links->thumbnail
							]);
						}
					}
				}
			}



		}

		echo "Data updated. <a href='/admin'>Go back</a>";
		
		// print_r($results);

	}

}






