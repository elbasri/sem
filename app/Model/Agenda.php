<?php

class Agenda extends AppModel{
	//public $name='Post';
	public $validate = array(
	'ref' => array(array('rule' => 'notEmpty'),'unique' => array('rule'=>'isUnique','message'=>'Ce Référence est déjà pris (taper un autre)')),
	'typep' => array('rule' => 'notEmpty'),
	'projet_ida' => array('rule' => 'notEmpty'),
	'projet_idp' => array('rule' => 'notEmpty'),
	'projet_ids' => array('rule' => 'notEmpty'),
	'projet_idd' => array('rule' => 'notEmpty'),
	'projet_idc' => array('rule' => 'notEmpty'),
	'projet_idf' => array('rule' => 'notEmpty'),
	'client_id' => array('rule' => 'notEmpty'),
	'date' => array('rule' => 'notEmpty'),
	);
	
	public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
}
?>