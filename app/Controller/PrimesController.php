<?php
App::uses('AppController', 'Controller');

class PrimesController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Prime','Employe','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Prime.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Prime.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Primes']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Prime->isOwnedBy($postId,$user['id']))
				return true;
			else if($user['role']!=='admin')
				$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		}
		return parent::isAuthorized($user);
	}
	
	public function admin(){
				$this->set('current_icon','icons/money.png');
				$this->set('current_controller','primes/admin');
				$this->set('current_controllername','Primes');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','primes/admin');
				$this->set('current_iconviewname',"Administration");
				$this->set('title_for_layout',"Administration");
	$this->layout = 'admin';
		$this->Paginator->settings=$this->paginate;
	if($this->Session->read('tri')=='desc')
		$this->Paginator->settings=$this->paginatedesc;
		$post=$this->Paginator->paginate('Prime');
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
		$post=$this->Prime->findById($id);
		if($post){
		$titredetest=$post['Prime']['nom'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Prime->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Prime->findById($id);
			if($post){
				$this->set('current_icon','icons/money.png');
				$this->set('current_controller','primes/admin');
				$this->set('current_controllername','Primes');
				$this->set('current_iconview','icons/afficher.png');
				$this->set('current_view','primes/view/'.$id."/".$titre);
				$this->set('current_iconviewname',"Prime: ".$post['Prime']['nom']);
				$this->set('title_for_layout',"Prime: ".$post['Prime']['nom']);
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
				$this->set('current_icon','icons/money.png');
				$this->set('current_controller','primes/admin');
				$this->set('current_controllername','Primes');
				$this->set('current_iconview','icons/ajouter.png');
				$this->set('current_view','primes/add');
				$this->set('current_iconviewname',"Ajouter une prime");
				$this->set('title_for_layout',"Ajouter une prime");
	$this->layout = 'admin';
	$options = $this->Employe->find('list', array('fields'=> array('Employe.id', 'Employe.nom')));
	$this->set(compact('options'));
		if($this->request->is('Post'))
		{
			$this->Prime->create();
			$employe=$this->Employe->findById($this->request->data['Prime']['employe_id']);
			$this->request->data['Prime']['employe_nom'] = $employe['Employe']['nom'];
			$this->request->data['Prime']['user_id'] = $this->Auth->User('id');
			if($this->Prime->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Primes";
				$this->request->data['Evennement']['logicielar']="المكافات";
				$this->request->data['Evennement']['logicielen']="Rewards";
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
		if($this->Prime->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Primes";
				$this->request->data['Evennement']['logicielar']="المكافات";
				$this->request->data['Evennement']['logicielen']="Rewards";
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
				$this->set('current_icon','icons/money.png');
				$this->set('current_controller','primes/admin');
				$this->set('current_controllername','Primes');
				$this->set('current_iconview','icons/modifier.png');
				$this->set('current_view','primes/modifier/'.$id);
				$this->set('current_iconviewname',"Modification d'une prime");
				$this->set('title_for_layout',"Modification d'une prime");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Prime->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide Maintenance'));
		$this->Prime->id=$id;
		
		if(!$this->request->data){
			$this->request->data=$post;
			$options = $this->Employe->find('list', array('fields'=> array('Employe.id', 'Employe.nom')));
			$this->set(compact('options'));
			}
		else{
			$employe=$this->Employe->findById($this->request->data['Prime']['employe_id']);
			$this->request->data['Prime']['employe_nom'] = $employe['Employe']['nom'];
		if($this->Prime->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Primes";
				$this->request->data['Evennement']['logicielar']="المكافات";
				$this->request->data['Evennement']['logicielen']="Rewards";
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
				$this->set('current_icon','icons/money.png');
				$this->set('current_controller','primes/admin');
				$this->set('current_controllername','Primes');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','primes/recherche');
				$this->set('current_iconviewname',"Recherche de primes");
				$this->set('title_for_layout',"Recherche de primes");
	$this->layout = 'admin';
		$test=0;
	$options = $this->Employe->find('list', array('fields'=> array('Employe.id', 'Employe.nom')));
	$this->set(compact('options'));
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '1')
				$realisation=$this->Prime->find('all',array('conditions'=>array('Prime.id='.$this->request->data['Prime']['ide'])));
			else if($_POST['rechercher'] == '2'){
			$dated=$this->request->data['Prime']['dated']['year']."-".$this->request->data['Prime']['dated']['month']."-".$this->request->data['Prime']['dated']['day'];
			$datef=$this->request->data['Prime']['datef']['year']."-".$this->request->data['Prime']['datef']['month']."-".$this->request->data['Prime']['datef']['day'];
			
			$conditions = array('Prime.date <=' => $datef, 'Prime.date >=' => $dated);
			$realisation=$this->Prime->find('all', array('conditions' => $conditions));
				//$realisation=$this->Prime->find('all',array('conditions'=>array('Prime.jusqua BETWEEN '.$dated.' AND '.$datef)));
				//$this->User->find('all', array('conditions' => array('User.reg_date BETWEEN '.$start_date.' AND DATE_ADD('.$start_date.', INTERVAL 30 DAY)')));
			}
			else if($_POST['rechercher'] == '3')
				$realisation=$this->Prime->find('all',array('conditions'=>array('Prime.employe_id='.$this->request->data['Prime']['employe_id'])));
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
	$this->set('title_for_layout',"Rapport d'une prime");
	$this->layout = 'imprimer';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		$post=$this->Prime->findById($id);
		if($post){
			//$post=$this->Prime->findById($id);
			if($post){ 
				$this->set('post',$post);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Primes";
				$this->request->data['Evennement']['logicielar']="المكافات";
				$this->request->data['Evennement']['logicielen']="Rewards";
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
	public function imprimerliste($pdf=null){
	if($this->Session->read('Auth.User.imprimerliste')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->set('title_for_layout',"Liste de primes");
	$this->layout = 'imprimer';
		$post=$this->Prime->find('all');
		$this->set(compact('post'));
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer liste";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Primes";
				$this->request->data['Evennement']['logicielar']="المكافات";
				$this->request->data['Evennement']['logicielen']="Rewards";
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