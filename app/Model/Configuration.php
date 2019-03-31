<?php

class Configuration extends AppModel{
	//public $name='Post';
	public $validate = array(
	'titre' => array('rule' => 'notEmpty'),
	'titrear' => array('rule' => 'notEmpty'),
	'titreen' => array('rule' => 'notEmpty'),
	'logo' => array('rule' => 'notEmpty'),
	'email' => array('rule' => 'notEmpty'),
	'tel' => array('rule' => 'notEmpty'),
	'Devises' => array('rule' => 'notEmpty'),
	'adresse' => array('rule' => 'notEmpty'),
	'adressear' => array('rule' => 'notEmpty'),
	'adresseen' => array('rule' => 'notEmpty'),
	'codep' => array('rule' => 'notEmpty'),
	'ville' => array('rule' => 'notEmpty'),
	'villear' => array('rule' => 'notEmpty'),
	'villeen' => array('rule' => 'notEmpty'),
	'pays' => array('rule' => 'notEmpty'),
	'paysar' => array('rule' => 'notEmpty'),
	'paysen' => array('rule' => 'notEmpty'),
	'tva' => array('rule' => 'notEmpty'),
	'poids' => array('rule' => 'notEmpty'),
	'volume' => array('rule' => 'notEmpty'),
	'servicestext' => array('rule' => 'notEmpty'),
	'servicestextar' => array('rule' => 'notEmpty'),
	'servicestexten' => array('rule' => 'notEmpty'),
	'produitstext' => array('rule' => 'notEmpty'),
	'produitstextar' => array('rule' => 'notEmpty'),
	'produitstexten' => array('rule' => 'notEmpty'),
	'quitext' => array('rule' => 'notEmpty'),
	'quitextar' => array('rule' => 'notEmpty'),
	'quitexten' => array('rule' => 'notEmpty'),
	'nouveatestext' => array('rule' => 'notEmpty'),
	'nouveatestextar' => array('rule' => 'notEmpty'),
	'nouveatestexten' => array('rule' => 'notEmpty'),
	'pourtext' => array('rule' => 'notEmpty'),
	'pourtextar' => array('rule' => 'notEmpty'),
	'pourtexten' => array('rule' => 'notEmpty'),
	'iretard' => array('rule' => 'notEmpty'),
	'distance' => array('rule' => 'notEmpty'),
	);
	
	public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
}
?>