<?php 
App::uses('SimplePasswordHasher','Controller/Component/Auth');

class User extends AppModel{
 public $validate =array(
		'username' => array(
            'length' => array(
                'rule'      => array('minLength', 4),
                'message'   => 'Doit être plus de 5 caractères',
                'required'  => true,
            ),
            'alphanum' => array(
                'rule'      => 'alphanumeric',
                'message'   => 'Peut contenir que des lettres et des chiffres',
            ),
            'unique' => array(
                'rule'      => 'isUnique',
                'message'   => 'Ce Pseudo est déjà pris (taper un autre)',
            ),
        ),
		'password' => array(
            'length' => array(
                'rule'      => array('minLength', 6),
                'message'   => 'Doit être plus de 6 caractères',
                'required'  => true,
				'on'        => 'create'
            ),
            'alphanum' => array(
                'rule'      => 'alphanumeric',
                'message'   => 'Peut contenir que des lettres et des chiffres',
				'on'        => 'create'
            ),
			
        ),
        'email' => array(
            'email' => array(
                'rule'      => 'email',
                'message'   => 'Doit être une adresse e-mail valide',
            ),
            'unique' => array(
                'rule'      => 'isUnique',
                'message'   => 'Ce Email est déjà pris (taper un autre)',
            ),
        ),
		'role' => array('required' => array('rule'=>array('inList',array('admin','moderateur','client'),'message'=>'il faut entrer en role valide'))),
		
		'civilite' => array('rule' => 'notEmpty'),
		'nom' => array('rule' => 'notEmpty'),
		'tel' => array('rule' => 'notEmpty'),
		'societe' => array('rule' => 'notEmpty'),
		'pays' => array('rule' => 'notEmpty'),
		'ville' => array('rule' => 'notEmpty'),
		'codep' => array('rule' => 'notEmpty'),
		'etat' => array('rule' => 'notEmpty'),
		'limites' => array('rule' => 'notEmpty'),
		);
 
 public function beforeSave($options=array()){
	if(isset($this->data[$this->alias]['password'])){
		$passwordHasher= new SimplePasswordHasher();
		$this->data[$this->alias]['password']=$passwordHasher->hash($this->data[$this->alias]['password']);
	}
	return true;
 }
 public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
 
}

?>
