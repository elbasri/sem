<?php
App::uses('AppController', 'Controller');

class MaintenancesController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Maintenance','Materiel','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Maintenance.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Maintenance.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Maintenances']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Maintenance->isOwnedBy($postId,$user['id']))
				return true;
			else if($user['role']!=='admin')
				$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		}
		return parent::isAuthorized($user);
	}
	
	
	public function admin(){
	$this->set('title_for_layout',"Gestion de maintenances");
	$this->layout = 'admin';
		$this->Paginator->settings=$this->paginate;
	if($this->Session->read('tri')=='desc')
		$this->Paginator->settings=$this->paginatedesc;
	$date=date('Y-m-d');
	if($this->Session->read('typemaintenance')=='t'){
				$this->set('current_icon','icons/wrench.png');
				$this->set('current_controller','maintenances/tout');
				$this->set('current_controllername','Maintenances');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','maintenances/t');
				$this->set('current_iconviewname',"Maintenances Treminés");
				$this->set('title_for_layout',"Maintenances Treminés");
		$post=$this->Paginator->paginate('Maintenance',array('datef <'=>$date));
	}
	else if($this->Session->read('typemaintenance')=='e'){
				$this->set('current_icon','icons/wrench.png');
				$this->set('current_controller','maintenances/tout');
				$this->set('current_controllername','Maintenances');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','maintenances/e');
				$this->set('current_iconviewname',"Maintenances encours");
				$this->set('title_for_layout',"Maintenances encours");
		$post=$this->Paginator->paginate('Maintenance',array('datef >='=>$date,'dated <='=>$date));
	}
	else if($this->Session->read('typemaintenance')=='a'){
				$this->set('current_icon','icons/wrench.png');
				$this->set('current_controller','maintenances/tout');
				$this->set('current_controllername','Maintenances');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','maintenances/a');
				$this->set('current_iconviewname',"Maintenances planifiés");
				$this->set('title_for_layout',"Maintenances planifiés");
		$post=$this->Paginator->paginate('Maintenance',array('dated >'=>$date));
	}
	else{
				$this->set('current_icon','icons/wrench.png');
				$this->set('current_controller','maintenances/tout');
				$this->set('current_controllername','Maintenances');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','maintenances/admin');
				$this->set('current_iconviewname',"Administration");
				$this->set('title_for_layout',"Administration");
		$post=$this->Paginator->paginate('Maintenance');
		}
		$this->set(compact('post'));
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/admin');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/admin');
		}
	
	}
	public function imprimerliste($pdf=null){
	if($this->Session->read('Auth.User.imprimerliste')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->set('title_for_layout',"Liste de maintenances");
	$this->layout = 'imprimer';
	if($this->Session->read('typemaintenance')=='t'){
		$post=$this->Maintenance->find('all',array('conditions'=>array('datef <'=>date('Y-m-d'))));
	}
	else if($this->Session->read('typemaintenance')=='e'){
		$post=$this->Maintenance->find('all',array('conditions'=>array('datef >='=>date('Y-m-d'),'dated <='.date('Y-m-d'))));
	}
	else if($this->Session->read('typemaintenance')=='a'){
		$post=$this->Maintenance->find('all',array('conditions'=>array('dated >'=>date('Y-m-d'))));
	}
	else
		$post=$this->Maintenance->find('all');
		$this->set(compact('post'));
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer liste";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Maintenances";
				$this->request->data['Evennement']['logicielar']="صيانات";
				$this->request->data['Evennement']['logicielen']="Maintenances";
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
	public function t($id=null){
		$this->Session->write('typemaintenance','t');
		$this->redirect(array('action'=>'admin'));
	}
	public function e($id=null){
		$this->Session->write('typemaintenance','e');
		$this->redirect(array('action'=>'admin'));
	}
	public function a($id=null){
		$this->Session->write('typemaintenance','a');
		$this->redirect(array('action'=>'admin'));
	}
	public function tout($id=null){
		$this->Session->write('typemaintenance','tout');
		$this->redirect(array('action'=>'admin'));
	}
	
	public function view($id=null,$titre=null){
	$this->layout = 'admin';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		if(!$titre){
		$this->redirect(array('action'=>'../'));
		}
		$post=$this->Maintenance->findById($id);
		if($post){
		$titredetest=$post['Maintenance']['nom'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Maintenance->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Maintenance->findById($id);
			if($post){
				$this->set('current_icon','icons/wrench.png');
				$this->set('current_controller','maintenances/tout');
				$this->set('current_controllername','Maintenances');
				$this->set('current_iconview','icons/afficher.png');
				$this->set('current_view','maintenances/view/'.$id."/".$titre);
				$this->set('current_iconviewname',"Maintenance: ".$post['Maintenance']['nom']);
				$this->set('title_for_layout',"Maintenance: ".$post['Maintenance']['nom']);
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
				$this->set('current_icon','icons/wrench.png');
				$this->set('current_controller','maintenances/tout');
				$this->set('current_controllername','Maintenances');
				$this->set('current_iconview','icons/ajouter.png');
				$this->set('current_view','maintenances/add');
				$this->set('current_iconviewname',"Ajouter une maintenance");
				$this->set('title_for_layout',"Ajouter une maintenance");
	$this->layout = 'admin';
	$options = $this->Materiel->find('list', array('fields'=> array('Materiel.id', 'Materiel.nom')));
	$this->set(compact('options'));
		if($this->request->is('Post'))
		{
			$this->Maintenance->create();
			$employe=$this->Materiel->findById($this->request->data['Maintenance']['materiel_id']);
			$this->request->data['Maintenance']['materiel_nom'] = $employe['Materiel']['nom'];
			$this->request->data['Maintenance']['user_id'] = $this->Auth->User('id');
			if($this->Maintenance->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Maintenances";
				$this->request->data['Evennement']['logicielar']="صيانات";
				$this->request->data['Evennement']['logicielen']="Maintenances";
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
		if($this->Maintenance->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Maintenances";
				$this->request->data['Evennement']['logicielar']="صيانات";
				$this->request->data['Evennement']['logicielen']="Maintenances";
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
				$this->set('current_icon','icons/wrench.png');
				$this->set('current_controller','maintenances/tout');
				$this->set('current_controllername','Maintenances');
				$this->set('current_iconview','icons/modifier.png');
				$this->set('current_view','maintenances/modifier/'.$id);
				$this->set('current_iconviewname',"Modification d'une maintenance");
				$this->set('title_for_layout',"Modification d'une maintenance");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Maintenance->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide Maintenance'));
		$this->Maintenance->id=$id;
		
		if(!$this->request->data){
			$this->request->data=$post;
			$options = $this->Materiel->find('list', array('fields'=> array('Materiel.id', 'Materiel.nom')));
			$this->set(compact('options'));
			}
		else{
			$employe=$this->Materiel->findById($this->request->data['Maintenance']['materiel_id']);
			$this->request->data['Maintenance']['materiel_nom'] = $employe['Materiel']['nom'];
			if($this->Maintenance->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Maintenances";
				$this->request->data['Evennement']['logicielar']="صيانات";
				$this->request->data['Evennement']['logicielen']="Maintenances";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
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
				$this->set('current_icon','icons/wrench.png');
				$this->set('current_controller','maintenances/tout');
				$this->set('current_controllername','Maintenances');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','maintenances/recherche');
				$this->set('current_iconviewname',"Recherche de maintenances");
				$this->set('title_for_layout',"Recherche de maintenances");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '1')
				$realisation=$this->Maintenance->find('all',array('conditions'=>array('Maintenance.id='.$this->request->data['Maintenance']['ide'])));
			else if($_POST['rechercher'] == '2'){
			$dated=$this->request->data['Maintenance']['dated']['year']."-".$this->request->data['Maintenance']['dated']['month']."-".$this->request->data['Maintenance']['dated']['day'];
			$datef=$this->request->data['Maintenance']['datef']['year']."-".$this->request->data['Maintenance']['datef']['month']."-".$this->request->data['Maintenance']['datef']['day'];
			
			$conditions = array('Maintenance.dated <=' => $datef, 'Maintenance.dated >=' => $dated);
			$realisation=$this->Maintenance->find('all', array('conditions' => $conditions));
				//$realisation=$this->Maintenance->find('all',array('conditions'=>array('Maintenance.jusqua BETWEEN '.$dated.' AND '.$datef)));
				//$this->User->find('all', array('conditions' => array('User.reg_date BETWEEN '.$start_date.' AND DATE_ADD('.$start_date.', INTERVAL 30 DAY)')));
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
	$this->layout = 'imprimer';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		$post=$this->Maintenance->findById($id);
		if($post){
			//$post=$this->Maintenance->findById($id);
			if($post){
				$this->set('title_for_layout',$post['Maintenance']['nom']);
				$this->set('post',$post);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Maintenances";
				$this->request->data['Evennement']['logicielar']="صيانات";
				$this->request->data['Evennement']['logicielen']="Maintenances";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
				if($pdf=="pdf"){
						$name=$this->request->params['controller']."_".md5(time());
						$this->layout = 'imprimerpdf';
						$this->Mpdf->init();
						$this->Mpdf->setFilename($name.'.pdf');
						$this->Mpdf->setOutput('D');
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
} // fin de "appcontroller"
?>