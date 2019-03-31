<?php

class Materiel extends AppModel{
	//public $name='Post';
	public $validate = array(
	'nom' => array('rule' => 'notEmpty'),
// 	'ref' => array(array('rule' => 'notEmpty'),'unique' => array('rule'=>'isUnique','message'=>'Ce Référence est déjà pris (taper un autre)')),
	//'ref' => array(array('allowEmpty' => true,'on' => 'create','unique' => array('rule'=>'isUnique','message'=>'Ce Numéro est déjà pris (taper un autre)'))),
	
	'qte' => array('rule' => 'notEmpty'),
	'type' => array('rule' => 'notEmpty'),
	);
	
	public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
}
?>
