<?php

class Inventaire extends AppModel{
	//public $name='Post';
	public $validate = array(
	'nom_id' => array('rule' => 'notEmpty'),
	//'ref' => array(array('rule' => 'notEmpty'),'unique' => array('rule'=>'isUnique','message'=>'Ce Référence est déjà pris (taper un autre)')),
	'designation' => array('rule' => 'notEmpty'),
	'prixv' => array('rule' => 'notEmpty'),
	'prix' => array('rule' => 'notEmpty'),
	'qte' => array('rule' => 'notEmpty'),
	'reffabricant' => array('rule' => 'notEmpty'),
	'emplacement' => array('rule' => 'notEmpty'),
	);
	
	public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
}
?>
