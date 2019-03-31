<?php

class Compte extends AppModel{
	//public $name='Post';
	public $validate = array(
	'numero' => array(array('rule' => 'notEmpty'),'unique' => array('rule'=>'isUnique','message'=>'Ce Numéro est déjà pris (taper un autre)')),
	'nom' => array('rule' => 'notEmpty'),
	'iban' => array('rule' => 'notEmpty'),
	'swift' => array('rule' => 'notEmpty')
	);
	
	public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
}
?>