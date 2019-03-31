<?php

class Contrat extends AppModel{
	//public $name='Post';
	public $validate = array(
	'reference' => array(array('rule' => 'notEmpty'),'unique' => array('rule'=>'isUnique','message'=>'Ce Numéro est déjà pris (taper un autre)')),
	'nom' => array('rule' => 'notEmpty'),
	'cout' => array('rule' => 'notEmpty'),
	'nom' => array('rule' => 'notEmpty'),
	);
	
	public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
}
?>