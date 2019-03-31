<?php
App::uses('AppController', 'Controller');

class RapportsController extends AppController{
	public $helpers = array('Html', 'Form');
	//public $components = array('DebugKit.Toolbar');
	
	public function isAuthorized($user){
		if($user['limites']!=='0' && $user['limites']!=='1' && $user['Rapports']!=='1')
			return false;
		return parent::isAuthorized($user);
	}
	
	public function index(){
	/*$this->layout = 'admin';
		$post=$this->Configuration->findById(1);
		if(!$post)
			throw new NotFoundException(_('Invalide Configuration'));
		$this->Configuration->id=1;
		
		if(!$this->request->data){
			$this->request->data=$post;
			}
		else if($this->Configuration->save($this->request->data)){
			$this->Session->setFlash('Les Configurations ont été bien enregistrer'));
			return $this->redirect(array('action'=>'index'));
			}
			*/
	}

} // fin de "appcontroller"
?>