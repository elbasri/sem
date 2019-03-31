<?php
App::uses('AppController', 'Controller');

class PaiesController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Paie','Employe','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Paie.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Paie.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Paies']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','Supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Paie->isOwnedBy($postId,$user['id']))
				return true;
			else if($user['role']!=='admin')
				$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		}
		return parent::isAuthorized($user);
	}
	
	public function admin(){
				$this->set('current_icon','icons/coins.png');
				$this->set('current_controller','paies/admin');
				$this->set('current_controllername','Paies');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','paies/admin');
				$this->set('current_iconviewname',"Administration");
				$this->set('title_for_layout',"Administration");
	$this->layout = 'admin';
		$this->Paginator->settings=$this->paginate;
	if($this->Session->read('tri')=='desc')
		$this->Paginator->settings=$this->paginatedesc;
		$post=$this->Paginator->paginate('Paie');
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
		$post=$this->Paie->findById($id);
		if($post){
		$titredetest=$post['Paie']['ref'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Paie->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Paie->findById($id);
			$employe=$this->Employe->findById($post['Paie']['employe_id']);
			$this->set('employe',$employe);
			if($post){
				$this->set('current_icon','icons/coins.png');
				$this->set('current_controller','paies/admin');
				$this->set('current_controllername','Paies');
				$this->set('current_iconview','icons/afficher.png');
				$this->set('current_view','paies/view/'.$id."/".$titre);
				$this->set('current_iconviewname',"Bulletin de paie");
				$this->set('title_for_layout',"Bulletin de paie");
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
				$this->set('current_icon','icons/coins.png');
				$this->set('current_controller','paies/admin');
				$this->set('current_controllername','Paies');
				$this->set('current_iconview','icons/ajouter.png');
				$this->set('current_view','paies/add');
				$this->set('current_iconviewname',"Ajouter un paie");
				$this->set('title_for_layout',"Ajouter un paie");
	$this->layout = 'admin';
	$options = $this->Employe->find('list', array('fields'=> array('Employe.id', 'Employe.nom')));
	$this->set(compact('options'));
		if($this->request->is('Post'))
		{
			$this->Paie->create();
			$employe=$this->Employe->findById($this->request->data['Paie']['employe_id']);
			$this->request->data['Paie']['employe_nom'] = $employe['Employe']['nom'];
			$this->request->data['Paie']['mensuel'] = $employe['Employe']['salaire'];
			$this->request->data['Paie']['user_id'] = $this->Auth->User('id');
			if($this->Paie->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Paie";
				$this->request->data['Evennement']['logicielar']="جدول الرواتب";
				$this->request->data['Evennement']['logicielen']="Payroll";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
				$this->Session->setFlash($this->addmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
				return $this->redirect(array('action'=>'admin'));
			}
		}
	
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/add');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/add');
		}
	
	}
	public function Supprimer($id=null){
	if($this->Session->read('Auth.User.delete')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->layout = 'admin';
		if($this->request->is('get'))
					throw new MethodNotAllowedException();
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		if($this->Paie->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Paie";
				$this->request->data['Evennement']['logicielar']="جدول الرواتب";
				$this->request->data['Evennement']['logicielen']="Payroll";
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
				$this->set('current_icon','icons/coins.png');
				$this->set('current_controller','paies/admin');
				$this->set('current_controllername','Paies');
				$this->set('current_iconview','icons/modifier.png');
				$this->set('current_view','paies/modifier/'.$id);
				$this->set('current_iconviewname',"Modification d'un paie");
				$this->set('title_for_layout',"Modification d'un paie");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Paie->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide Maintenance'));
		$this->Paie->id=$id;
		
		if(!$this->request->data){
			$this->request->data=$post;
			$options = $this->Employe->find('list', array('fields'=> array('Employe.id', 'Employe.nom')));
			$this->set(compact('options'));
			}
		else {
			$employe=$this->Employe->findById($this->request->data['Paie']['employe_id']);
			$this->request->data['Paie']['employe_nom'] = $employe['Employe']['nom'];
			$this->request->data['Paie']['mensuel'] = $employe['Employe']['salaire'];
		if($this->Paie->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Paie";
				$this->request->data['Evennement']['logicielar']="جدول الرواتب";
				$this->request->data['Evennement']['logicielen']="Payroll";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
			$this->Session->setFlash($this->delmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
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
				$this->set('current_icon','icons/coins.png');
				$this->set('current_controller','paies/admin');
				$this->set('current_controllername','Paies');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','paies/recherche');
				$this->set('current_iconviewname',"Recherche de paies");
				$this->set('title_for_layout',"Recherche de paies");
	$this->layout = 'admin';
		$test=0;
	$options = $this->Employe->find('list', array('fields'=> array('Employe.id', 'Employe.nom')));
	$this->set(compact('options'));
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '1')
				$realisation=$this->Paie->find('all',array('conditions'=>array('Paie.id='.$this->request->data['Paie']['ide'])));
			else if($_POST['rechercher'] == '2'){
			$dated=$this->request->data['Paie']['dated']['year']."-".$this->request->data['Paie']['dated']['month']."-".$this->request->data['Paie']['dated']['day'];
			$datef=$this->request->data['Paie']['datef']['year']."-".$this->request->data['Paie']['datef']['month']."-".$this->request->data['Paie']['datef']['day'];
			
			$conditions = array('Paie.date <=' => $datef, 'Paie.date >=' => $dated);
			$realisation=$this->Paie->find('all', array('conditions' => $conditions));
				//$realisation=$this->Paie->find('all',array('conditions'=>array('Paie.jusqua BETWEEN '.$dated.' AND '.$datef)));
				//$this->User->find('all', array('conditions' => array('User.reg_date BETWEEN '.$start_date.' AND DATE_ADD('.$start_date.', INTERVAL 30 DAY)')));
			}
			else if($_POST['rechercher'] == '3')
				$realisation=$this->Paie->find('all',array('conditions'=>array('Paie.employe_id='.$this->request->data['Paie']['employe_id'])));
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
	$this->layout = 'imprimerb';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
			$post=$this->Paie->findById($id);
			if($post){
			$employe=$this->Employe->findById($post['Paie']['employe_id']);
			$this->set('employe',$employe);	
				$this->set('title_for_layout',"Bulletin de paie ");			
				$this->set('post',$post);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Paie";
				$this->request->data['Evennement']['logicielar']="جدول الرواتب";
				$this->request->data['Evennement']['logicielen']="Payroll";
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
	$this->set('title_for_layout',"Liste de paies");
	$this->layout = 'imprimer';
		$post=$this->Paie->find('all');
		$this->set(compact('post'));
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer liste";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Paie";
				$this->request->data['Evennement']['logicielar']="جدول الرواتب";
				$this->request->data['Evennement']['logicielen']="Payroll";
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