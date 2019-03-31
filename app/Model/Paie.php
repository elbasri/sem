<?php
class Paie extends AppModel{
 public $validate =array(
		'nom' => array('rule' => 'notEmpty'),
		'prime' => array('rule' => 'notEmpty'),
		'ref' => array(array('rule' => 'notEmpty'),'unique' => array('rule'=>'isUnique','message'=>'Ce Référence est déjà pris (taper un autre)')),
		'conges' => array('rule' => 'notEmpty'),
		'noncotisations' => array('rule' => 'notEmpty'),
		'salariales' => array('rule' => 'notEmpty'),
		'autre' => array('rule' => 'notEmpty'),
		'patronales' => array('rule' => 'notEmpty'),
		'euros' => array('rule' => 'notEmpty'),
		'imposable' => array('rule' => 'notEmpty'),
		'congesdumois' => array('rule' => 'notEmpty'),
		'congesacquis' => array('rule' => 'notEmpty'),
		'rttacquis' => array('rule' => 'notEmpty'),
		'coefficient' => array('rule' => 'notEmpty'),
		'classification' => array('rule' => 'notEmpty'),
		);
 public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
 
}

?>