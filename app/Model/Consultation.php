<?php

class Consultation extends AppModel{
	//public $name='Post';
	//public $useDbConfig = 'sgeadmin';
	public $validate = array(
	'titre' => array('rule' => 'notEmpty'),
	'titrear' => array('rule' => 'notEmpty'),
	'titreen' => array('rule' => 'notEmpty'),
	'img' => array('rule' => 'notEmpty'),
	
	);
	
	public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
}
?>