<?php

class Stockaction extends AppModel{
	//public $name='Post';
	public $validate = array(
	'nom' => array('rule' => 'notEmpty'),
	'qte' => array('rule' => 'notEmpty'),
	'typevaleur' => array('rule' => 'notEmpty'),
	);
	
	public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
}
?>