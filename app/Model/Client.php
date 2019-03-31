<?php
class Client extends AppModel{
 public $validate =array(
		//'civilite' => array('rule' => 'notEmpty'),
		'nom' => array(array('rule' => 'notEmpty'),'unique' => array('rule'=>'isUnique','message'=>'Ce Service exist déjà')),
		//'nom' => array('rule' => 'notEmpty'),
		/*'prenom' => array('rule' => 'notEmpty'),
		'tel' => array('rule' => 'notEmpty'),
		'societe' => array('rule' => 'notEmpty'),
		'ville' => array('rule' => 'notEmpty'),
		'codep' => array('rule' => 'notEmpty'),
		'pays' => array('rule' => 'notEmpty'),
		'adressepostale' => array('rule' => 'notEmpty')*/
		);
 public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
 
}

?>
