<?php
App::uses('AppController', 'Controller');

class TachesController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Tache','Employe','Projet','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Tache.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Tache.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Taches']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Tache->isOwnedBy($postId,$user['id']))
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
	$date=date('Y-m-d');
	if($this->Session->read('typetache')=='t'){
				$this->set('current_icon','icons/time.png');
				$this->set('current_controller','taches/tout');
				$this->set('current_controllername','Tâches');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','taches/t');
				$this->set('current_iconviewname',"Taches terminés");
				$this->set('title_for_layout',"Taches terminés");
		$post=$this->Paginator->paginate('Tache',array('datef <'=>$date));
	}
	else if($this->Session->read('typetache')=='e'){
				$this->set('current_icon','icons/time.png');
				$this->set('current_controller','taches/tout');
				$this->set('current_controllername','Tâches');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','taches/e');
				$this->set('current_iconviewname',"Taches encours");
				$this->set('title_for_layout',"Taches encours");
		$post=$this->Paginator->paginate('Tache',array('datef >='=>$date,'dated <='=>$date));
	}
	else if($this->Session->read('typetache')=='a'){
				$this->set('current_icon','icons/time.png');
				$this->set('current_controller','taches/tout');
				$this->set('current_controllername','Tâches');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','taches/a');
				$this->set('current_iconviewname',"Taches à venir");
				$this->set('title_for_layout',"Taches à venir");
		$post=$this->Paginator->paginate('Tache',array('dated >'=>$date));
	}
	else{
				$this->set('current_icon','icons/time.png');
				$this->set('current_controller','taches/tout');
				$this->set('current_controllername','Tâches');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','taches/tout');
				$this->set('current_iconviewname',"Administration");
				$this->set('title_for_layout',"Administration");
		$post=$this->Paginator->paginate('Tache');
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
	$this->set('title_for_layout',"Liste de taches");
	$this->layout = 'imprimer';
	if($this->Session->read('typetache')=='t'){
		$post=$this->Tache->find('all',array('conditions'=>array('datef <'=>date('Y-m-d'))));
	}
	else if($this->Session->read('typetache')=='e'){
		$post=$this->Tache->find('all',array('conditions'=>array('datef >='=>date('Y-m-d'),'dated <='.date('Y-m-d'))));
	}
	else if($this->Session->read('typetache')=='a'){
		$post=$this->Tache->find('all',array('conditions'=>array('dated >'=>date('Y-m-d'))));
	}
	else
		$post=$this->Tache->find('all');
		$this->set(compact('post'));
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer liste";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Tâches";
				$this->request->data['Evennement']['logicielar']="المهام";
				$this->request->data['Evennement']['logicielen']="Tasks";
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
		$this->Session->write('typetache','t');
		$this->redirect(array('action'=>'admin'));
	}
	public function e($id=null){
		$this->Session->write('typetache','e');
		$this->redirect(array('action'=>'admin'));
	}
	public function a($id=null){
		$this->Session->write('typetache','a');
		$this->redirect(array('action'=>'admin'));
	}
	public function tout($id=null){
		$this->Session->write('typetache','tout');
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
		$post=$this->Tache->findById($id);
		if($post){
		$titredetest=$post['Tache']['nom'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Tache->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Tache->findById($id);
			if($post){
				$this->set('current_icon','icons/time.png');
				$this->set('current_controller','taches/tout');
				$this->set('current_controllername','Tâches');
				$this->set('current_iconview','icons/afficher.png');
				$this->set('current_view','taches/view/'.$id."/".$titre);
				$this->set('current_iconviewname',"Tache: ".$post['Tache']['nom']);
				$this->set('title_for_layout',"Tache: ".$post['Tache']['nom']);
				$this->set('post',$post);
				}
				else
				throw new NotFoundException(_('invalide Tache!'));
			}
		else{
			throw new NotFoundException(_('invalide titre de Tache!'));
			}
		}else{
			throw new NotFoundException(_('invalide titre de Tache!'));
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
				$this->set('current_icon','icons/time.png');
				$this->set('current_controller','taches/tout');
				$this->set('current_controllername','Tâches');
				$this->set('current_iconview','icons/ajouter.png');
				$this->set('current_view','taches/add');
				$this->set('current_iconviewname',"Ajouter une tache");
				$this->set('title_for_layout',"Ajouter une tache");
	$this->layout = 'admin';
	$options = $this->Employe->find('list', array('fields'=> array('Employe.id', 'Employe.nom')));
	$optionsp = $this->Projet->find('list', array('fields'=> array('Projet.id', 'Projet.nom')));
	$this->set(compact('options','optionsp'));
		if($this->request->is('Post'))
		{
			$this->Tache->create();
			$employe=$this->Employe->findById($this->request->data['Tache']['employe_id']);
			$this->request->data['Tache']['employe_nom'] = $employe['Employe']['nom'];
			$employe=$this->Projet->findById($this->request->data['Tache']['projet_id']);
			$this->request->data['Tache']['projet_nom'] = $employe['Projet']['nom'];
			$this->request->data['Tache']['user_id'] = $this->Auth->User('id');
			if($this->Tache->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Tâches";
				$this->request->data['Evennement']['logicielar']="المهام";
				$this->request->data['Evennement']['logicielen']="Tasks";
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
		if($this->Tache->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Tâches";
				$this->request->data['Evennement']['logicielar']="المهام";
				$this->request->data['Evennement']['logicielen']="Tasks";
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
				$this->set('current_icon','icons/time.png');
				$this->set('current_controller','taches/tout');
				$this->set('current_controllername','Tâches');
				$this->set('current_iconview','icons/modifier.png');
				$this->set('current_view','taches/modifier');
				$this->set('current_iconviewname',"Modification d'une tache");
				$this->set('title_for_layout',"Modification d'une tache");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Tache->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide Tache'));
		$this->Tache->id=$id;
		
		if(!$this->request->data){
			$this->request->data=$post;
			$options = $this->Employe->find('list', array('fields'=> array('Employe.id', 'Employe.nom')));
			$optionsp = $this->Projet->find('list', array('fields'=> array('Projet.id', 'Projet.nom')));
			$this->set(compact('options','optionsp'));
			}
		else{
			$employe=$this->Employe->findById($this->request->data['Tache']['employe_id']);
			$this->request->data['Tache']['employe_nom'] = $employe['Employe']['nom'];
			$employe=$this->Projet->findById($this->request->data['Tache']['projet_id']);
			$this->request->data['Tache']['projet_nom'] = $employe['Projet']['nom'];
		if($this->Tache->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Tâches";
				$this->request->data['Evennement']['logicielar']="المهام";
				$this->request->data['Evennement']['logicielen']="Tasks";
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
				$this->set('current_icon','icons/time.png');
				$this->set('current_controller','taches/tout');
				$this->set('current_controllername','Tâches');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','taches/recherche');
				$this->set('current_iconviewname',"Recherche de taches");
				$this->set('title_for_layout',"Recherche de taches");
	$this->layout = 'admin';
		$test=0;
	$options = $this->Employe->find('list', array('fields'=> array('Employe.id', 'Employe.nom')));
	$this->set(compact('options'));
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '1')
				$realisation=$this->Tache->find('all',array('conditions'=>array('Tache.id='.$this->request->data['Tache']['ide'])));
			else if($_POST['rechercher'] == '2'){
			$dated=$this->request->data['Tache']['dated']['year']."-".$this->request->data['Tache']['dated']['month']."-".$this->request->data['Tache']['dated']['day'];
			$datef=$this->request->data['Tache']['datef']['year']."-".$this->request->data['Tache']['datef']['month']."-".$this->request->data['Tache']['datef']['day'];
			
			$conditions = array('Tache.dated <=' => $datef, 'Tache.dated >=' => $dated);
			$realisation=$this->Tache->find('all', array('conditions' => $conditions));
				//$realisation=$this->Tache->find('all',array('conditions'=>array('Tache.jusqua BETWEEN '.$dated.' AND '.$datef)));
				//$this->User->find('all', array('conditions' => array('User.reg_date BETWEEN '.$start_date.' AND DATE_ADD('.$start_date.', INTERVAL 30 DAY)')));
			}
			else if($_POST['rechercher'] == '3')
				$realisation=$this->Tache->find('all',array('conditions'=>array('Tache.employe_id='.$this->request->data['Tache']['employe_id'])));
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
	$this->set('title_for_layout',"Rapport d'une tache");
	$this->layout = 'imprimer';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		$post=$this->Tache->findById($id);
		if($post){
			//$post=$this->Tache->findById($id);
			if($post){ 
				$this->set('post',$post);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Tâches";
				$this->request->data['Evennement']['logicielar']="المهام";
				$this->request->data['Evennement']['logicielen']="Tasks";
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
				throw new NotFoundException(_('invalide Tache!'));
		}else{
			throw new NotFoundException(_('invalide titre de Tache!'));
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