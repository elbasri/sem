<?php

class Piece extends AppModel{
	//public $name='Post';
	public $validate = array(
	'nom' => array('rule' => 'notEmpty'),
	'espace' => array('rule' => 'notEmpty'),
	'etage' => array('rule' => 'notEmpty'),
	'porte' => array('rule' => 'notEmpty'),
	'adresse' => array('rule' => 'notEmpty'),
	);
	
	public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
}
?>