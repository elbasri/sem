<?php

class Facture extends AppModel{
	//public $name='Post';
	public $validate = array(
	'nom' => array('rule' => 'notEmpty'),
		'reference' => array(array('rule' => 'notEmpty'),'unique' => array('rule'=>'isUnique','message'=>'Ce Référence est déjà pris (taper un autre)')),
	'venteachat' => array('rule' => 'notEmpty'),
	'typev' => array('rule' => 'notEmpty'),
	'commande_idv' => array('rule' => 'notEmpty'),
	'client_idv' => array('rule' => 'notEmpty'),
	'typea' => array('rule' => 'notEmpty'),
	'commande_ida' => array('rule' => 'notEmpty'),
	'client_ida' => array('rule' => 'notEmpty'),
	'devise' => array('rule' => 'notEmpty'),
	'typearticle' => array('rule' => 'notEmpty'),
	'typeaa' => array('rule' => 'notEmpty'),
	'typepp' => array('rule' => 'notEmpty'),
	'typess' => array('rule' => 'notEmpty'),
	'qte' => array('rule' => 'notEmpty'),
	'etat' => array('rule' => 'notEmpty'),
	'tva1' => array('rule' => 'notEmpty'),
	'tva2' => array('rule' => 'notEmpty'),
	'frais' => array('rule' => 'notEmpty'),
	'remise' => array('rule' => 'notEmpty'),
	);
	
	public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
}
?>