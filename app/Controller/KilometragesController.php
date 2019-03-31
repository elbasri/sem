<?php
App::uses('AppController', 'Controller');

class KilometragesController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Kilometrage','Inventaire','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Kilometrage.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Kilometrage.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Kilometrages']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Kilometrage->isOwnedBy($postId,$user['id']))
				return true;
			else if($user['role']!=='admin')
				$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		}
		return parent::isAuthorized($user);
	}
	
	
	public function admin(){
	$this->layout = 'admin';
		$this->Paginator->settings=$this->paginate;
	if($this->Session->read('tri')=='desc')
		$this->Paginator->settings=$this->paginatedesc;
	if($this->Session->read('typeKilometrage')=='personnelle'){
		$post=$this->Paginator->paginate('Kilometrage',array('type '=>'personnelle'));
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','kilometrages/tout');
			$this->set('current_controllername','Frais de déplacement: kilométrage ');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','kilometrages/personnelle');
			$this->set('current_iconviewname','personnelle');
			$this->set('title_for_layout','personnelle');
	}
	else if($this->Session->read('typeKilometrage')=='professionnelle'){
		$post=$this->Paginator->paginate('Kilometrage',array('type '=>'professionnelle'));
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','kilometrages/tout');
			$this->set('current_controllername','Frais de déplacement: kilométrage ');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','kilometrages/professionnelle');
			$this->set('current_iconviewname','professionnelle');
			$this->set('title_for_layout','professionnelle');
	}
	else{
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','kilometrages/tout');
			$this->set('current_controllername','Frais de déplacement: kilométrage');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','kilometrages/admin');
			$this->set('current_iconviewname','Administration');
			$this->set('title_for_layout',"Administration");
		$post=$this->Paginator->paginate('Kilometrage');
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
	$this->set('title_for_layout',"Liste de Kilometrage");
	$this->layout = 'imprimer';
	if($this->Session->read('typeKilometrage')=='professionnelle'){
		$post=$this->Kilometrage->find('all',array('conditions'=>array('type '=>'professionnelle')));
	}
	else if($this->Session->read('typeKilometrage')=='personnelle'){
		$post=$this->Kilometrage->find('all',array('conditions'=>array('type '=>'personnelle')));
	}
	else
		$post=$this->Kilometrage->find('all');
		$this->set(compact('post'));
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer liste";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Kilometrages";
				$this->request->data['Evennement']['logicielar']="مسافات";
				$this->request->data['Evennement']['logicielen']="Mileage";
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
	
	public function personnelle($id=null){
		$this->Session->write('typeKilometrage','personnelle');
		$this->redirect(array('action'=>'admin'));
	}
	public function professionnelle($id=null){
		$this->Session->write('typeKilometrage','professionnelle');
		$this->redirect(array('action'=>'admin'));
	}
	/*
	public function t($id=null){
		$this->Session->write('typeKilometrage','t');
		$this->redirect(array('action'=>'admin'));
	}
	public function e($id=null){
		$this->Session->write('typeKilometrage','e');
		$this->redirect(array('action'=>'admin'));
	}
	public function a($id=null){
		$this->Session->write('typeKilometrage','a');
		$this->redirect(array('action'=>'admin'));
	}*/
	public function tout($id=null){
		$this->Session->write('typeKilometrage','tout');
		$this->redirect(array('action'=>'admin'));
	}
	
	public function view($id=null,$titre=null){
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','kilometrages/tout');
			$this->set('current_controllername','Frais de déplacement: kilométrage');
			$this->set('current_iconview','icons/afficher.png');
			$this->set('current_view','kilometrages/view/'.$id."/".$titre);
			$this->set('current_iconviewname','Kilometrage: '.$titre);
			$this->set('title_for_layout',"Kilometrage: ".$titre);
	$this->layout = 'admin';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		if(!$titre){
		$this->redirect(array('action'=>'../'));
		}
		$post=$this->Kilometrage->findById($id);
		if($post){
		$titredetest=$post['Kilometrage']['ref'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Kilometrage->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Kilometrage->findById($id);
			if($post){
				$this->set('title_for_layout',$post['Kilometrage']['ref']);
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
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','kilometrages/tout');
			$this->set('current_controllername','Frais de déplacement: kilométrage');
			$this->set('current_iconview','icons/ajouter.png');
			$this->set('current_view','kilometrages/add');
			$this->set('current_iconviewname','Ajouter une Kilometrage');
			$this->set('title_for_layout',"Ajouter une Kilometrage");
	$this->layout = 'admin';
	
	$options =$this->Inventaire->find('list', array('fields'=> array('Inventaire.id', 'Inventaire.nom'),'conditions'=>array('categorie'=>'Véhicule')));
	$this->set(compact('options'));
		if($this->request->is('Post'))
		{
			$this->Kilometrage->create();
			$employe=$this->Inventaire->findById($this->request->data['Kilometrage']['inventaire_id']);
			$this->request->data['Kilometrage']['inventaire_nom'] = $employe['Inventaire']['nom'];
			
			$this->request->data['Kilometrage']['distance']=$this->request->data['Kilometrage']['arrivee']-$this->request->data['Kilometrage']['depart'];
			$this->request->data['Kilometrage']['total']=$this->request->data['Kilometrage']['distance']*$this->request->data['Kilometrage']['taux'];
			
			$this->request->data['Kilometrage']['user_id'] = $this->Auth->User('id');
			if($this->Kilometrage->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Kilometrages";
				$this->request->data['Evennement']['logicielar']="مسافات";
				$this->request->data['Evennement']['logicielen']="Mileage";
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
		if($this->Kilometrage->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Kilometrages";
				$this->request->data['Evennement']['logicielar']="مسافات";
				$this->request->data['Evennement']['logicielen']="Mileage";
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
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','kilometrages/tout');
			$this->set('current_controllername','Frais de déplacement: kilométrage');
			$this->set('current_iconview','icons/modifier.png');
			$this->set('current_view','kilometrages/modifier/'.$id);
			$this->set('current_iconviewname','Modification d\'une Kilometrage');
			$this->set('title_for_layout',"Modification d'une Kilometrage");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Kilometrage->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide Kilometrage'));
		$this->Kilometrage->id=$id;
		
		if(!$this->request->data){
			$this->request->data=$post;
			
				$options =$this->Inventaire->find('list', array('fields'=> array('Inventaire.id', 'Inventaire.nom')));
				$this->set(compact('options'));
			}
		else{
			$employe=$this->Inventaire->findById($this->request->data['Kilometrage']['inventaire_id']);
			$this->request->data['Kilometrage']['inventaire_nom'] = $employe['Inventaire']['nom'];
			
			$this->request->data['Kilometrage']['distance']=$this->request->data['Kilometrage']['arrivee']-$this->request->data['Kilometrage']['depart'];
			$this->request->data['Kilometrage']['total']=$this->request->data['Kilometrage']['distance']*$this->request->data['Kilometrage']['taux'];
			
			if($this->Kilometrage->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Kilometrages";
				$this->request->data['Evennement']['logicielar']="مسافات";
				$this->request->data['Evennement']['logicielen']="Mileage";
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
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','kilometrages/tout');
			$this->set('current_controllername','Frais de déplacement: kilométrage');
			$this->set('current_iconview','icons/rechercher.png');
			$this->set('current_view','kilometrages/recherche');
			$this->set('current_iconviewname','Recherche de Kilometrages');
			$this->set('title_for_layout',"Recherche de Kilometrages");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '3')
				$realisation=$this->Kilometrage->find('all',array('conditions'=>array('Kilometrage.ref='.$this->request->data['Kilometrage']['refe'])));
			if($_POST['rechercher'] == '1')
				$realisation=$this->Kilometrage->find('all',array('conditions'=>array('Kilometrage.id='.$this->request->data['Kilometrage']['ide'])));
			else if($_POST['rechercher'] == '2'){
			$dated=$this->request->data['Kilometrage']['dated']['year']."-".$this->request->data['Kilometrage']['dated']['month']."-".$this->request->data['Kilometrage']['dated']['day'];
			$datef=$this->request->data['Kilometrage']['datef']['year']."-".$this->request->data['Kilometrage']['datef']['month']."-".$this->request->data['Kilometrage']['datef']['day'];
			
			$conditions = array('Kilometrage.date <=' => $datef, 'Kilometrage.date >=' => $dated);
			$realisation=$this->Kilometrage->find('all', array('conditions' => $conditions));
				//$realisation=$this->Kilometrage->find('all',array('conditions'=>array('Saisir.jusqua BETWEEN '.$dated.' AND '.$datef)));
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
		$post=$this->Kilometrage->findById($id);
		if($post){
			//$post=$this->Kilometrage->findById($id);
			if($post){
				$this->set('title_for_layout',"Kilometrage: ".$post['Kilometrage']['ref']);
				$this->set('post',$post);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Kilometrages";
				$this->request->data['Evennement']['logicielar']="مسافات";
				$this->request->data['Evennement']['logicielen']="Mileage";
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