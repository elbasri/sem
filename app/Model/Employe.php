<?php
class Employe extends AppModel{
 public $validate =array(
		'civilite' => array('rule' => 'notEmpty'),
		'nom' => array('rule' => 'notEmpty'),
		'prenom' => array('rule' => 'notEmpty'),
		'cin' => array(array('rule' => 'notEmpty'),'unique' => array('rule'=>'isUnique','message'=>'Ce CIN est déjà pris (taper un autre)')),
		'tel' => array('rule' => 'notEmpty'),
		'adressepostale' => array('rule' => 'notEmpty'),
		'pays' => array('rule' => 'notEmpty'),
		'ville' => array('rule' => 'notEmpty'),
		'codep' => array('rule' => 'notEmpty'),
		'noter' => array('rule' => 'notEmpty'),
		'salaire' => array('rule' => 'notEmpty'),
		'matricule' => array('rule' => 'notEmpty'),
		'cnss' => array('rule' => 'notEmpty'),
		);
 public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
 
}

?>