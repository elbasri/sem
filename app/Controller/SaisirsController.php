<?php
App::uses('AppController', 'Controller');

class SaisirsController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Saisir','Compte','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Saisir.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Saisir.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Saisirs']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Saisir->isOwnedBy($postId,$user['id']))
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
	if($this->Session->read('typeSaisie')=='debit'){
		$post=$this->Paginator->paginate('Saisir',array('type '=>'Débit'));
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','saisirs/tout');
			$this->set('current_controllername','Comptabilité: Saisie ');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','saisirs/debit');
			$this->set('current_iconviewname','Débit');
			$this->set('title_for_layout','Débit');
	}
	else if($this->Session->read('typeSaisie')=='credit'){
		$post=$this->Paginator->paginate('Saisir',array('type '=>'Crédit'));
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','saisirs/tout');
			$this->set('current_controllername','Comptabilité: Saisie ');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','saisirs/credit');
			$this->set('current_iconviewname','Crédit');
			$this->set('title_for_layout','Crédit');
	}
	else{
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','saisirs/tout');
			$this->set('current_controllername','Comptabilité: Saisie Débit/Crédit');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','saisirs/admin');
			$this->set('current_iconviewname','Administration');
			$this->set('title_for_layout',"Administration");
		$post=$this->Paginator->paginate('Saisir');
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
	$this->set('title_for_layout',"Liste de Saisie Débit/Crédit");
	$this->layout = 'imprimer';
	if($this->Session->read('typeSaisie')=='debit'){
		$post=$this->Saisir->find('all',array('conditions'=>array('type '=>'Débit')));
	}
	else if($this->Session->read('typeSaisie')=='credit'){
		$post=$this->Saisir->find('all',array('conditions'=>array('type '=>'Crédit')));
	}
	else
		$post=$this->Saisir->find('all');
		$this->set(compact('post'));
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer liste";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Saisie Débit/Crédit";
				$this->request->data['Evennement']['logicielar']="إدخال خصم/إئتمان";
				$this->request->data['Evennement']['logicielen']="Entering Debit/Credit";
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
	
	public function debit($id=null){
		$this->Session->write('typeSaisie','debit');
		$this->redirect(array('action'=>'admin'));
	}
	public function credit($id=null){
		$this->Session->write('typeSaisie','credit');
		$this->redirect(array('action'=>'admin'));
	}
	/*
	public function t($id=null){
		$this->Session->write('typeSaisie','t');
		$this->redirect(array('action'=>'admin'));
	}
	public function e($id=null){
		$this->Session->write('typeSaisie','e');
		$this->redirect(array('action'=>'admin'));
	}
	public function a($id=null){
		$this->Session->write('typeSaisie','a');
		$this->redirect(array('action'=>'admin'));
	}*/
	public function tout($id=null){
		$this->Session->write('typeSaisie','tout');
		$this->redirect(array('action'=>'admin'));
	}
	
	public function view($id=null,$titre=null){
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','saisirs/tout');
			$this->set('current_controllername','Comptabilité: Saisie Débit/Crédit');
			$this->set('current_iconview','icons/afficher.png');
			$this->set('current_view','saisirs/view/'.$id."/".$titre);
			$this->set('current_iconviewname','Saisie: '.$titre);
			$this->set('title_for_layout',"Saisie: ".$titre);
	$this->layout = 'admin';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		if(!$titre){
		$this->redirect(array('action'=>'../'));
		}
		$post=$this->Saisir->findById($id);
		if($post){
		$titredetest=$post['Saisir']['ref'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Saisir->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Saisir->findById($id);
			if($post){
				$this->set('title_for_layout',$post['Saisir']['ref']);
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
			$this->set('current_controller','saisirs/tout');
			$this->set('current_controllername','Comptabilité: Saisie Débit/Crédit');
			$this->set('current_iconview','icons/ajouter.png');
			$this->set('current_view','saisirs/add');
			$this->set('current_iconviewname','Ajouter une Saisie');
			$this->set('title_for_layout',"Ajouter une Saisie");
	$this->layout = 'admin';
	
	$options =$this->Compte->find('list', array('fields'=> array('Compte.id', 'Compte.nom')));
	$this->set(compact('options'));
		if($this->request->is('Post'))
		{
			$this->Saisir->create();
			$employe=$this->Compte->findById($this->request->data['Saisir']['compte_id']);
			$this->request->data['Saisir']['compte_nom'] = $employe['Compte']['nom'];
			
			$this->request->data['Saisir']['user_id'] = $this->Auth->User('id');
			if($this->Saisir->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Saisie Débit/Crédit";
				$this->request->data['Evennement']['logicielar']="إدخال خصم/إئتمان";
				$this->request->data['Evennement']['logicielen']="Entering Debit/Credit";
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
		if($this->Saisir->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Saisie Débit/Crédit";
				$this->request->data['Evennement']['logicielar']="إدخال خصم/إئتمان";
				$this->request->data['Evennement']['logicielen']="Entering Debit/Credit";
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
			$this->set('current_controller','saisirs/tout');
			$this->set('current_controllername','Comptabilité: Saisie Débit/Crédit');
			$this->set('current_iconview','icons/modifier.png');
			$this->set('current_view','saisirs/modifier/'.$id);
			$this->set('current_iconviewname','Modification d\'une Saisie');
			$this->set('title_for_layout',"Modification d'une Saisie");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Saisir->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide Saisie'));
		$this->Saisir->id=$id;
		
		if(!$this->request->data){
			$this->request->data=$post;
			
				$options =$this->Compte->find('list', array('fields'=> array('Compte.id', 'Compte.nom')));
				$this->set(compact('options'));
			}
		else{
			$employe=$this->Compte->findById($this->request->data['Saisir']['compte_id']);
			$this->request->data['Saisir']['compte_nom'] = $employe['Compte']['nom'];
			
			if($this->Saisir->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Saisie Débit/Crédit";
				$this->request->data['Evennement']['logicielar']="إدخال خصم/إئتمان";
				$this->request->data['Evennement']['logicielen']="Entering Debit/Credit";
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
			$this->set('current_controller','saisirs/tout');
			$this->set('current_controllername','Comptabilité: Saisie Débit/Crédit');
			$this->set('current_iconview','icons/rechercher.png');
			$this->set('current_view','saisirs/recherche');
			$this->set('current_iconviewname','Recherche de Saisies');
			$this->set('title_for_layout',"Recherche de Saisies");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '3')
				$realisation=$this->Saisir->find('all',array('conditions'=>array('Saisir.ref='.$this->request->data['Saisir']['refe'])));
			if($_POST['rechercher'] == '1')
				$realisation=$this->Saisir->find('all',array('conditions'=>array('Saisir.id='.$this->request->data['Saisir']['ide'])));
			else if($_POST['rechercher'] == '2'){
			$dated=$this->request->data['Saisir']['dated']['year']."-".$this->request->data['Saisir']['dated']['month']."-".$this->request->data['Saisir']['dated']['day'];
			$datef=$this->request->data['Saisir']['datef']['year']."-".$this->request->data['Saisir']['datef']['month']."-".$this->request->data['Saisir']['datef']['day'];
			
			$conditions = array('Saisir.date <=' => $datef, 'Saisir.date >=' => $dated);
			$realisation=$this->Saisir->find('all', array('conditions' => $conditions));
				//$realisation=$this->Saisir->find('all',array('conditions'=>array('Saisir.jusqua BETWEEN '.$dated.' AND '.$datef)));
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
		$post=$this->Saisir->findById($id);
		if($post){
			//$post=$this->Saisir->findById($id);
			if($post){
				$this->set('title_for_layout',"Saisie: ".$post['Saisir']['ref']);
				$this->set('post',$post);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Saisie Débit/Crédit";
				$this->request->data['Evennement']['logicielar']="إدخال خصم/إئتمان";
				$this->request->data['Evennement']['logicielen']="Entering Debit/Credit";
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
			$this->set(compact('test'));
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/imprimer');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/imprimer');
		}
	
	}
} // fin de "appcontroller"
?>