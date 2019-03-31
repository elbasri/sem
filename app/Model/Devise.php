<?php

class Devise extends AppModel{
	//public $name='Post';
	public $validate = array(
	'nom' => array('rule' => 'notEmpty'),
	'reference' => array(array('rule' => 'notEmpty'),'unique' => array('rule'=>'isUnique','message'=>'Ce Référence est déjà pris (taper un autre)')),
	'ladate' => array('rule' => 'notEmpty'),
	'devise' => array('rule' => 'notEmpty'),
	'tva1' => array('rule' => 'notEmpty'),
	'tva2' => array('rule' => 'notEmpty'),
	'frais' => array('rule' => 'notEmpty'),
	'remise' => array('rule' => 'notEmpty'),
	'typearticle' => array('rule' => 'notEmpty'),
	'typea' => array('rule' => 'notEmpty'),
	'typep' => array('rule' => 'notEmpty'),
	'types' => array('rule' => 'notEmpty'),
	'qte' => array('rule' => 'notEmpty'),
	'etat' => array('rule' => 'notEmpty'),
	'montant' => array('rule' => 'notEmpty'),
	'typedevis' => array('rule' => 'notEmpty'),
	'type' => array('rule' => 'notEmpty'),
	);
	
	public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
}
?>