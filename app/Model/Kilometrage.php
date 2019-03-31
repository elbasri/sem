<?php

class Kilometrage extends AppModel{
	//public $name='Post';
	public $validate = array(
	'type' => array('rule' => 'notEmpty'),
	'inventaire_id' => array('rule' => 'notEmpty'),
	'description' => array('rule' => 'notEmpty'),
	'voyageurs' => array('rule' => 'notEmpty'),
	'date' => array('rule' => 'notEmpty'),
	'trajet' => array('rule' => 'notEmpty'),
	'depart' => array('rule' => 'notEmpty'),
	'arrivee' => array('rule' => 'notEmpty'),
	'distance' => array('rule' => 'notEmpty'),
	'taux' => array('rule' => 'notEmpty'),
	'ref' => array(array('rule' => 'notEmpty'),'unique' => array('rule'=>'isUnique','message'=>'Ce Référence est déjà pris (taper un autre)')),
	);
	
	public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
}
?>