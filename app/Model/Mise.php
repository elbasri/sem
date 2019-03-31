<?php

class Mise extends AppModel{
	//public $name='Post';
	public $useDbConfig = 'sgeadmin';
	public $validate = array(
	'nom' => array('rule' => 'notEmpty'),
	'lien' => array('rule' => 'notEmpty'),
	);
	
	public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
}
?>