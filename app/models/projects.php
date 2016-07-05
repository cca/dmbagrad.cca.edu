<?php 

class projects extends model
{
	
	public function getProjects($filter = [])
	{
		$i = 0;
		$queryFilter = [];
		if (isset($filter['year']) && !empty($filter['year']))
			$queryFilter['AND']['semester[~]'] = '%'.$filter['year'].'%';

		if (isset($filter['category']) && $filter['category'])
			$queryFilter['AND']['dataType'] = $filter['category'] == 1 ? 'strategicForesight' : 'designStartegy';

		if (isset($filter['deleted']))
			$queryFilter['AND']['deleted'] = $filter['deleted'];
		

		if (isset($filter['text']) && $filter['text']) {
			$queryFilter['OR']['name[~]'] = $filter['text'];
			$queryFilter['OR']['students[~]'] = $filter['text'];
		}
		

		$pr = Sili::$db->select('projects', '*', $queryFilter);


		if ($pr) {
			foreach ($pr as $projectKey => $projectValue) {
				$project[$i] = $projectValue;
				$attachments = Sili::$db->select( 'attachments', '*', ['project_id' => $projectValue['id']]);
				$project[$i]['attachments'] = $attachments;
				if ($attachments) 
					foreach ($attachments as $attachKey => $attchValue) 
						$project[$i]['attachments'][$attachKey]['links'] =  Sili::$db->select('links', '*', ['attach_id' => $attchValue['id']]);
				$i++;
			}
		}
		

		if ($project) {
			foreach ($project as $key => $pro) {

				if ($pro['attachments']) {
					foreach ($pro['attachments'] as $attachment) {
						if (strpos($attachment['filename'], 'jpg') || strpos($attachment['filename'], 'png')) {
							$project[$key]['img'] = $attachment['links'][0]['thumbnail'];
							break;
						}
					}
				}

			}
		}
		

		return $project; 
	}


	public function toogle($id){
		$status = Sili::$db->get('projects', 'deleted', ['id' => $id]);
		Sili::$db->update('projects', ['deleted' =>  $status ? NULL : 1], ['id' => $id]);
		return $status;
	}


	public function getProject($id = false){
		$result = false;
		if ($id) {
			if ($project = Sili::$db->get('projects', '*', ['id' => $id])) {
				$attachments = Sili::$db->select('attachments', '*', ['project_id' => $project['id']]);
				if ($attachments) 
					foreach ($attachments as $attachKey => $attchValue) 
						$attachments[$attachKey]['links'][] =  Sili::$db->select('links', '*', ['attach_id' => $attchValue['id']]);
					
				
				$result = ['project' => $project, 'attachments' => $attachments];
			}
		}
		return $result;
	}

	public function updateProject($data = false, $id = false){
		if ($data && $id) {
			foreach ($data as $key => $value) {
				return Sili::$db->update('projects', $data, ['id' => $id]);
			}
		}
		return false;
	}


	// public function getAttachments($id = false){
	// 	$condition = Self::$rules->api([
	// 		'dbCondition' => new dbCondition(function(){
	// 			while (Self::$socket->results->status['CODE'] == '200') {
	// 				return $this->checkIn($id)
	// 			}
	// 		}),
	// 		'listener' => Sili::$app->listener(Self::$socket)
	// 	]);
	// 	Sili::$app->condition(new Condition($condition));
	// }
	
}