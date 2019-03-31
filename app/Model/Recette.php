<?php

class Recette extends AppModel{
	//public $name='Post';
	public $validate = array(
	'nom' => array('rule' => 'notEmpty'),
	'ref' => array(array('rule' => 'notEmpty'),'unique' => array('rule'=>'isUnique','message'=>'Ce Référence est déjà pris (taper un autre)')),
	'article' => array('rule' => 'notEmpty'),
	'compte_id' => array('rule' => 'notEmpty'),
	'tvaen' => array('rule' => 'notEmpty'),
	'tva' => array('rule' => 'notEmpty'),
	'total' => array('rule' => 'notEmpty'),
	);
	
	public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
}
?>