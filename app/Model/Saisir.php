<?php

class Saisir extends AppModel{
	//public $name='Post';
	public $validate = array(
	'montant' => array('rule' => 'notEmpty'),
	'compte_id' => array('rule' => 'notEmpty'),
	'description' => array('rule' => 'notEmpty'),
	'ref' => array(array('rule' => 'notEmpty'),'unique' => array('rule'=>'isUnique','message'=>'Ce Référence est déjà pris (taper un autre)')),
	);
	
	public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
}
?>