<?php

class Commande extends AppModel{
	//public $name='Post';
	public $validate = array(
	'nom' => array('rule' => 'notEmpty'),
	'reference' => array(array('rule' => 'notEmpty'),'unique' => array('rule'=>'isUnique','message'=>'Ce Référence est déjà pris (taper un autre)')),
	'devise' => array('rule' => 'notEmpty'),
	'type' => array('rule' => 'notEmpty'),
	'tva1' => array('rule' => 'notEmpty'),
	'remise' => array('rule' => 'notEmpty'),
	'qte' => array('rule' => 'notEmpty'),
	'typearticle' => array('rule' => 'notEmpty'),
	'typea' => array('rule' => 'notEmpty'),
	'typep' => array('rule' => 'notEmpty'),
	'types' => array('rule' => 'notEmpty'),
	'client_idf' => array('rule' => 'notEmpty'),
	'client_ids' => array('rule' => 'notEmpty'),
	'ladate' => array('rule' => 'notEmpty'),
	);
	
	public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
}
?>