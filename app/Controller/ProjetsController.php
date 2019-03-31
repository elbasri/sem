<?php
App::uses('AppController', 'Controller');

class ProjetsController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Projet','Client','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Projet.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Projet.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Projets']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Projet->isOwnedBy($postId,$user['id']))
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
	if($this->Session->read('typeprojet')=='t'){
				$this->set('current_icon','icons/folder.png');
				$this->set('current_controller','projets/tout');
				$this->set('current_controllername','Projets');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','projets/t');
				$this->set('current_iconviewname',"Projets terminés");
				$this->set('title_for_layout',"Projets terminés");
		$post=$this->Paginator->paginate('Projet',array('datef <'=>$date));
	}
	else if($this->Session->read('typeprojet')=='e'){
				$this->set('current_icon','icons/folder.png');
				$this->set('current_controller','projets/tout');
				$this->set('current_controllername','Projets');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','projets/e');
				$this->set('current_iconviewname',"Projets encours");
				$this->set('title_for_layout',"Projets encours");
		$post=$this->Paginator->paginate('Projet',array('datef >='=>$date,'dated <='=>$date));
	}
	else if($this->Session->read('typeprojet')=='a'){
				$this->set('current_icon','icons/folder.png');
				$this->set('current_controller','projets/tout');
				$this->set('current_controllername','Projets');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','projets/a');
				$this->set('current_iconviewname',"Projets à venir");
				$this->set('title_for_layout',"Projets à venir");
		$post=$this->Paginator->paginate('Projet',array('dated >'=>$date));
	}
	else{
				$this->set('current_icon','icons/folder.png');
				$this->set('current_controller','projets/tout');
				$this->set('current_controllername','Projets');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','projets/tout');
				$this->set('current_iconviewname',"Administration");
				$this->set('title_for_layout',"Administration");
		$post=$this->Paginator->paginate('Projet');
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
	$this->set('title_for_layout',"Liste de Projets");
	$this->layout = 'imprimer';
	if($this->Session->read('typeprojet')=='t'){
		$post=$this->Projet->find('all',array('conditions'=>array('datef <'=>date('Y-m-d'))));
	}
	else if($this->Session->read('typeprojet')=='e'){
		$post=$this->Projet->find('all',array('conditions'=>array('datef >='=>date('Y-m-d'),'dated <='.date('Y-m-d'))));
	}
	else if($this->Session->read('typeprojet')=='a'){
		$post=$this->Projet->find('all',array('conditions'=>array('dated >'=>date('Y-m-d'))));
	}
	else
		$post=$this->Projet->find('all');
		$this->set(compact('post'));
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer liste";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Projets";
				$this->request->data['Evennement']['logicielar']="المشاريع";
				$this->request->data['Evennement']['logicielen']="Projects";
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
		$this->Session->write('typeprojet','t');
		$this->redirect(array('action'=>'admin'));
	}
	public function e($id=null){
		$this->Session->write('typeprojet','e');
		$this->redirect(array('action'=>'admin'));
	}
	public function a($id=null){
		$this->Session->write('typeprojet','a');
		$this->redirect(array('action'=>'admin'));
	}
	public function tout($id=null){
		$this->Session->write('typeprojet','tout');
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
		$post=$this->Projet->findById($id);
		if($post){
		$titredetest=$post['Projet']['nom'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Projet->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Projet->findById($id);
			if($post){
				$this->set('current_icon','icons/folder.png');
				$this->set('current_controller','projets/tout');
				$this->set('current_controllername','Projets');
				$this->set('current_iconview','icons/afficher.png');
				$this->set('current_view','projets/view/'.$id."/".$titre);
				$this->set('current_iconviewname',"Projet: ".$post['Projet']['nom']);
				$this->set('title_for_layout',"Projet: ".$post['Projet']['nom']);
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
				$this->set('current_icon','icons/folder.png');
				$this->set('current_controller','projets/tout');
				$this->set('current_controllername','Projets');
				$this->set('current_iconview','icons/ajouter.png');
				$this->set('current_view','projets/add');
				$this->set('current_iconviewname',"Ajouter un projet");
				$this->set('title_for_layout',"Ajouter un projet");
	$this->layout = 'admin';
		if($this->request->is('Post'))
		{
			$this->Projet->create();
			$this->request->data['Projet']['user_id'] = $this->Auth->User('id');
			if($this->Projet->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Projets";
				$this->request->data['Evennement']['logicielar']="المشاريع";
				$this->request->data['Evennement']['logicielen']="Projects";
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
		if($this->Projet->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Projets";
				$this->request->data['Evennement']['logicielar']="المشاريع";
				$this->request->data['Evennement']['logicielen']="Projects";
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
				$this->set('current_icon','icons/folder.png');
				$this->set('current_controller','projets/tout');
				$this->set('current_controllername','Projets');
				$this->set('current_iconview','icons/modifier.png');
				$this->set('current_view','projets/modifier/'.$id);
				$this->set('current_iconviewname',"Modification d'un projet");
				$this->set('title_for_layout',"Modification d'un projet");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Projet->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide Realisation'));
		$this->Projet->id=$id;
		
		if(!$this->request->data)
			$this->request->data=$post;
		else if($this->Projet->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Projets";
				$this->request->data['Evennement']['logicielar']="المشاريع";
				$this->request->data['Evennement']['logicielen']="Projects";
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
				$this->set('current_icon','icons/folder.png');
				$this->set('current_controller','projets/tout');
				$this->set('current_controllername','Projets');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','projets/recherche');
				$this->set('current_iconviewname',"Recherche de projets");
				$this->set('title_for_layout',"Recherche de projets");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '3')
				$realisation=$this->Projet->find('all',array('conditions'=>array('Projet.id='.$this->request->data['Projet']['ide'])));
			else if($_POST['rechercher'] == '1'){
				//$realisation=$this->Projet->find('all',array('conditions'=>array('Projet.cout='.$this->request->data['Projet']['couts'])));
				$realisation=$this->Projet->find('all',array('conditions'=>array('Projet.cout BETWEEN '.$this->request->data['Projet']['cout1'].' AND '.$this->request->data['Projet']['cout2'])));
				
			}
			else if($_POST['rechercher'] == '2'){
			//print_r($this->request->data['Projet']['dated']);
			$dated=$this->request->data['Projet']['dated']['year']."-".$this->request->data['Projet']['dated']['month']."-".$this->request->data['Projet']['dated']['day'];
			$datef=$this->request->data['Projet']['datef']['year']."-".$this->request->data['Projet']['datef']['month']."-".$this->request->data['Projet']['datef']['day'];
			
			$conditions = array('Projet.dated <=' => $datef, 'Projet.dated >=' => $dated);
			$realisation=$this->Projet->find('all', array('conditions' => $conditions));
				//$realisation=$this->Projet->find('all',array('conditions'=>array('Projet.jusqua BETWEEN '.$dated.' AND '.$datef)));
				//$this->User->find('all', array('conditions' => array('User.reg_date BETWEEN '.$start_date.' AND DATE_ADD('.$start_date.', INTERVAL 30 DAY)')));
			}
			else if($_POST['rechercher'] == '4')
				$realisation=$this->Projet->find('all',array('conditions'=>array('Projet.ref='.$this->request->data['Projet']['serie'])));
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
	public function lier(){
	if($this->Session->read('Auth.User.edit')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
				$this->set('current_icon','icons/folder.png');
				$this->set('current_controller','projets/tout');
				$this->set('current_controllername','Projets');
				$this->set('current_iconview','icons/ajouter.png');
				$this->set('current_view','projets/lier');
				$this->set('current_iconviewname',"Recherche de projets");
				$this->set('title_for_layout',"Lier les projets et clients");
	$this->layout = 'admin';
		$optionsprojet = $this->Projet->find('list', array('fields'=> array('Projet.id', 'Projet.nom')));
		$optionsclient = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('type'=>'client')));
		
		$this->set(compact('optionsprojet','optionsclient'));
		if($this->request->is('Post')){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Lier";
				$this->request->data['Evennement']['titrear']="ربط";
				$this->request->data['Evennement']['titreen']="link";
				$this->request->data['Evennement']['logiciel']="Projets";
				$this->request->data['Evennement']['logicielar']="المشاريع";
				$this->request->data['Evennement']['logicielen']="Projects";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
			$this->Projet->id=$this->request->data['Projet']['nomprojet'];
			$this->Projet->saveField('client_id',$this->request->data['Projet']['nomclient']);
			$this->Session->setFlash($this->addmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
			return $this->redirect(array('controller'=>'clients','action'=>'projets'));
		}
	
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/lier');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/lier');
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
		$post=$this->Projet->findById($id);
		if($post){
			//$post=$this->Projet->findById($id);
			if($post){
				$this->set('title_for_layout',$post['Projet']['nom']);
				$this->set('post',$post);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Projets";
				$this->request->data['Evennement']['logicielar']="المشاريع";
				$this->request->data['Evennement']['logicielen']="Projects";
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