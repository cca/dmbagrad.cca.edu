<?php 

class user extends model
{
		
	public function signin($data){
		if ($data['password'] && $data['username']) {
			$user = Sili::$db->get('users', '*', ['username' => $data['username']]);
			if ($user) {
				if (md5($data['password']) == $user['password']) {
					Sili::$app->session->set('auth', 1);
					return true;
				}
			}
		}
		return false;
	}

	public function isAuth(){
		return Sili::$app->session->get('auth', false);
	}

}