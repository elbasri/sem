<?php
App::uses('AppController', 'Controller');

class AnnuairesController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Annuaire','Materiel');
	public $paginate= array('limit'=>'9','order'=>array('Annuaire.id'=>'asc'));
	public $paginatedesc= array('limit'=>'9','order'=>array('Annuaire.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Annuaires']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Annuaire->isOwnedBy($postId,$user['id']))
				return true;
			else if($user['role']!=='admin')
				$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		}
		return parent::isAuthorized($user);
	}
	
	
	public function admin(){
	$this->set('title_for_layout',"Gestion d'Annuaire");
	//$this->layout = 'admin';
		$this->Paginator->settings=$this->paginate;
	if($this->Session->read('tri')=='desc')
		$this->Paginator->settings=$this->paginatedesc;
		
		$post=$this->Paginator->paginate('Annuaire');
		$this->set(compact('post'));
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/admin');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/admin');
		}
	}
	public function admins(){
	$this->set('title_for_layout',"Gestion d'Annuaire");
	$this->layout = 'admin';
		$this->Paginator->settings=$this->paginate;
	if($this->Session->read('tri')=='desc')
		$this->Paginator->settings=$this->paginatedesc;
		
		$post=$this->Paginator->paginate('Annuaire');
		$this->set(compact('post'));
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/admins');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/admins');
		}
		
	}
	public function imprimerliste($pdf=null){
	if($this->Session->read('Auth.User.imprimerliste')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->set('title_for_layout',"Liste Annuaires");
	$this->layout = 'imprimer';
		$post=$this->Annuaire->find('all');
		$this->set(compact('post'));
		 if($pdf=="pdf"){
						$name=$this->request->params['controller']."_liste_".md5(time());
						$this->layout = 'imprimerpdf';
						$this->Mpdf->init();
						$this->Mpdf->setFilename($name.'.pdf');
						$this->Mpdf->setOutput('D');
						$this->Mpdf->SetWatermarkText("Draft");
						}
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/imprimerliste');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/imprimerliste');
		}
	}
	public function triasc($id=null){
		$this->Session->write('tri','asc');
		$this->redirect(array('action'=>'admin'));
	}
	public function tridesc($id=null){
		$this->Session->write('tri','desc');
		$this->redirect(array('action'=>'admin'));
	}
	
	public function view(){
	$this->set('title_for_layout',"SGE | Annuaire de Gestory");
	$this->layout = 'admin';
		$ref=$this->Session->read('ref');
		$post=$this->Annuaire->find('first',array('conditions'=>array('Annuaire.ref ='=>$ref)));
		$this->set(compact('post'));
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/view');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/view');
		}
	}
	public function done(){
		$ref=$this->Session->read('ref');
		$post=$this->Annuaire->find('first',array('conditions'=>array('Annuaire.ref ='=>$ref)));
		if($post['Annuaire']['etat']=='1' && $post['Annuaire']['type']=='0'){
			$this->Annuaire->id=$post['Annuaire']['id'];
			$this->Annuaire->saveField('etat','0');
		}
		$this->redirect(array('action'=>'view'));
	}
	public function add(){
	if($this->Session->read('Auth.User.add')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->set('title_for_layout',"Ajouter des Annuaires");
	$this->layout = 'admin';
		if($this->request->is('Post'))
		{
			$this->Annuaire->create();
			$this->request->data['Annuaire']['user_id'] = $this->Auth->User('id');
			if($this->Annuaire->save($this->request->data)){
				$this->Session->setFlash($this->addmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
				return $this->redirect(array('action'=>'admin'));
			}
			//throw new NotFoundException(_('Erreur:'));
		}
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/add');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/add');
		}
	}
	public function supprimer($id=null){
	if($this->Session->read('Auth.User.delete')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->layout = 'admin';
		if($this->request->is('get'))
					throw new MethodNotAllowedException();
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		if($this->Annuaire->delete($id)){
			$this->Session->setFlash($this->delmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
			return $this->redirect(array('action'=>'admin'));
		}
	}
	public function modifier($id=null){
	if($this->Session->read('Auth.User.edit')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->set('title_for_layout',"Modification de Annuaire");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Annuaire->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide Annuaire'));
		$this->Annuaire->id=$id;
		
		if(!$this->request->data){
			$this->request->data=$post;
			}
		else{
			if($this->Annuaire->save($this->request->data)){
					$this->Session->setFlash($this->editmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
					return $this->redirect(array('action'=>'admin'));
				}
			}
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/modifier');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/modifier');
		}
	}
	public function recherche(){
	if($this->Session->read('Auth.User.recherche')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->set('title_for_layout',"Recherche dans les Annuaires");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$cle=$this->request->data['Annuaire']['ref'];
			$realisation=$this->Annuaire->find('all',array('conditions'=>array('OR' => array('Annuaire.nom LIKE' => "%$cle%"))));
			$this->set(compact('realisation', 'test'));
		}
		if($test==0)
			$this->set(compact('test'));
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/recherche');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/recherche');
		}
	}
} // fin de "appcontroller"
?>