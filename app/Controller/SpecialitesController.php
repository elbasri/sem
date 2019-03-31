<?php
App::uses('AppController', 'Controller');

class SpecialitesController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Specialite','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Specialite.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Specialite.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Specialites']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Specialite->isOwnedBy($postId,$user['id']))
				return true;
			else if($user['role']!=='admin')
				$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		}
		return parent::isAuthorized($user);
	}
	
	
	public function admin(){
				$this->set('current_icon','icons/user.png');
				$this->set('current_controller','specialites/admin');
				$this->set('current_controllername','Spécialités');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','specialites/admin');
				$this->set('current_iconviewname',"Administration");
				$this->set('title_for_layout',"Administration");
	$this->layout = 'admin';
		$this->Paginator->settings=$this->paginate;
	if($this->Session->read('tri')=='desc')
		$this->Paginator->settings=$this->paginatedesc;
		$post=$this->Paginator->paginate('Specialite');
		$this->set(compact('post'));
	
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/admin');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/admin');
		}
	
	}
	
	public function view($id=null,$titre=null){
	$this->layout = 'admin';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		if(!$titre){
		$this->redirect(array('action'=>'../'));
		}
		$post=$this->Specialite->findById($id);
		if($post){
		$titredetest=$post['Specialite']['nom'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Specialite->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Specialite->findById($id);
			if($post){
				$this->set('current_icon','icons/user.png');
				$this->set('current_controller','specialites/admin');
				$this->set('current_controllername','Spécialités');
				$this->set('current_iconview','icons/afficher.png');
				$this->set('current_view','specialites/view/'.$id."/".$titre);
				$this->set('current_iconviewname',"Spécialité: ".$post['Specialite']['nom']);
				$this->set('title_for_layout',"Spécialité: ".$post['Specialite']['nom']);
				$this->set('post',$post);
				}
				else
				throw new NotFoundException($this->notfoundmessage);
			}
		else{
			throw new NotFoundException($this->notfoundmessage);
			}
		}else{
			throw new NotFoundException($this->notfoundmessage);
			}
	
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/view');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/view');
		}
	
	}
	public function add(){
	if($this->Session->read('Auth.User.add')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
				$this->set('current_icon','icons/user.png');
				$this->set('current_controller','specialites/admin');
				$this->set('current_controllername','Spécialités');
				$this->set('current_iconview','icons/ajouter.png');
				$this->set('current_view','specialites/add');
				$this->set('current_iconviewname',"Ajouter une spécialité");
				$this->set('title_for_layout',"Ajouter une spécialité");
	$this->layout = 'admin';
		if($this->request->is('Post'))
		{
			$this->Specialite->create();
			$this->request->data['Specialite']['user_id'] = $this->Auth->User('id');
			if($this->Specialite->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Specialites";
				$this->request->data['Evennement']['logicielar']="التخصصات";
				$this->request->data['Evennement']['logicielen']="Specialties";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
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
		if($this->Specialite->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Specialites";
				$this->request->data['Evennement']['logicielar']="التخصصات";
				$this->request->data['Evennement']['logicielen']="Specialties";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
			$this->Session->setFlash($this->delmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
			return $this->redirect(array('action'=>'admin'));
		}
	}
	public function modifier($id=null){
	if($this->Session->read('Auth.User.edit')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
				$this->set('current_icon','icons/user.png');
				$this->set('current_controller','specialites/admin');
				$this->set('current_controllername','Spécialités');
				$this->set('current_iconview','icons/modifier.png');
				$this->set('current_view','specialites/modifier');
				$this->set('current_iconviewname',"Modification d'une spécialité");
				$this->set('title_for_layout',"Modification d'une spécialité");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Specialite->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide Spécialité'));
		$this->Specialite->id=$id;
		
		if(!$this->request->data)
			$this->request->data=$post;
		else if($this->Specialite->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Specialites";
				$this->request->data['Evennement']['logicielar']="التخصصات";
				$this->request->data['Evennement']['logicielen']="Specialties";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
			
			$this->Session->setFlash($this->editmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
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
				$this->set('current_icon','icons/user.png');
				$this->set('current_controller','specialites/admin');
				$this->set('current_controllername','Spécialités');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','specialites/recherche');
				$this->set('current_iconviewname',"Recherche de spécialités");
				$this->set('title_for_layout',"Recherche de spécialités");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '2')
				$realisation=$this->Specialite->find('all',array('conditions'=>array('Specialite.id='.$this->request->data['Specialite']['ide'])));
			else if($_POST['rechercher'] == '1'){
				$cle=$this->request->data['Specialite']['nom1'];
				$realisation=$this->Specialite->find('all',array('conditions'=>array('OR' => array('Specialite.nom LIKE' => "%$cle%"))));
				}
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
	public function imprimer($id=null,$pdf=null){
	if($this->Session->read('Auth.User.imprimer')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->set('title_for_layout',"Rapport d'une spécialité");
	$this->layout = 'imprimer';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		$post=$this->Specialite->findById($id);
		if($post){
			//$post=$this->Specialite->findById($id);
			if($post){ 
				$this->set('post',$post);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Specialites";
				$this->request->data['Evennement']['logicielar']="التخصصات";
				$this->request->data['Evennement']['logicielen']="Specialties";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
				if($pdf=="pdf"){
						$name=$this->request->params['controller']."_".md5(time());
						$this->layout = 'imprimerpdf';
						$this->Mpdf->init();
						//$url="http://".$_SERVER['SERVER_NAME']."/app/webroot";
						//$this->Mpdf->setBasePath($url);
						$this->Mpdf->setOutput('D');
						$this->Mpdf->setFilename($name.'.pdf');
						$this->Mpdf->SetWatermarkText("Draft");
						}
				}
				else
				throw new NotFoundException($this->notfoundmessage);
		}else{
			throw new NotFoundException($this->notfoundmessage);
			}
	
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/imprimer');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/imprimer');
		}
	
	}
	public function imprimerliste($pdf=null){
	if($this->Session->read('Auth.User.imprimerliste')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->set('title_for_layout',"Liste de spécialités");
	$this->layout = 'imprimer';
		$post=$this->Specialite->find('all');
		$this->set(compact('post'));
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer liste";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Specialites";
				$this->request->data['Evennement']['logicielar']="التخصصات";
				$this->request->data['Evennement']['logicielen']="Specialties";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
			
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

} // fin de "appcontroller"
?>