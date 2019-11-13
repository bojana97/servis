<?php

namespace app\rbac;

use yii\rbac\Rule;

class KreatorPravilo extends Rule {

	//has to be unique
	public $name = 'kreator';


	public function execute ($user, $item, $params)
	{
		//if(!isset($params['object'])) return false;
		//if(!isset($params['objects']->korisnikID)) return false;
			
			//return $params['object']->korisnikID == $user;
		 return isset($params['model']) ? $params['model']->prijavio == $user : false;
	}


}


?>