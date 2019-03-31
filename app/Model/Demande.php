<?php

class Demande extends AppModel{
	//public $name='Post';
	public $validate = array(
	'nom' => array('rule' => 'notEmpty'),
	'email' => array('rule' => 'notEmpty'),
	'societe' => array('rule' => 'notEmpty'),
	'tel' => array('rule' => 'notEmpty'),
	'titre' => array('rule' => 'notEmpty')
	);
}
?>