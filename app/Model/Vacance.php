<?php
class Vacance extends AppModel{
 public $validate =array(
		'nom' => array('rule' => 'notEmpty'),
		'ref' => array(array('rule' => 'notEmpty'),'unique' => array('rule'=>'isUnique','message'=>'Ce Référence est déjà pris (taper un autre)')),
		'cout' => array('rule' => 'notEmpty'),
		);
 public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
 
}

?>