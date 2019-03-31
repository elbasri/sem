<?php
App::uses('AppController', 'Controller');

class ComptesController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Compte','Materiel','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Compte.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Compte.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Comptes']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Compte->isOwnedBy($postId,$user['id']))
				return true;
			else if($user['role']!=='admin')
				$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		}
		return parent::isAuthorized($user);
	}
	
	
	public function admin(){
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','comptes/admin');
			$this->set('current_controllername','Comptes bancaires');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','comptes/admin');
			$this->set('current_iconviewname','Administration');
			$this->set('title_for_layout',"Administration");
	$this->layout = 'admin';
		$this->Paginator->settings=$this->paginate;
	if($this->Session->read('tri')=='desc')
		$this->Paginator->settings=$this->paginatedesc;
		
		$post=$this->Paginator->paginate('Compte');
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
	$this->set('title_for_layout',"Liste de comptes bancaires");
	$this->layout = 'imprimer';
		$post=$this->Compte->find('all');
		$this->set(compact('post'));
		 if($pdf=="pdf"){
						$name=$this->request->params['controller']."_liste_".md5(time());
						$this->layout = 'imprimerpdf';
						$this->Mpdf->init();
						$this->Mpdf->setFilename($name.'.pdf');
						$this->Mpdf->setOutput('D');
						$this->Mpdf->SetWatermarkText("Draft");
						}
		
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer la liste de comptes bancaires";
				$this->request->data['Evennement']['titrear']="طباعة قائمة الحسابات البنكية";
				$this->request->data['Evennement']['titreen']="Print a liste of bank accounts";
				$this->request->data['Evennement']['logiciel']="Comptes bancaires";
				$this->request->data['Evennement']['logicielar']="حسابات بنكية";
				$this->request->data['Evennement']['logicielen']="Bank accounts";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
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
	
	public function view($id=null,$titre=null){
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','comptes/admin');
			$this->set('current_controllername','Comptes bancaires');
			$this->set('current_iconview','icons/afficher.png');
			$this->set('current_view','comptes/view/'.$id."/".$titre);
			$this->set('current_iconviewname',"Compte: ".$titre);
			$this->set('title_for_layout',"Compte: ".$titre);
	$this->layout = 'admin';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		if(!$titre){
		$this->redirect(array('action'=>'../'));
		}
		$post=$this->Compte->findById($id);
		if($post){
		$titredetest=$post['Compte']['nom'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Compte->findByTitre($titre);
		if($titre==$titredetest){
			if($post){
				$this->set('title_for_layout',$post['Compte']['nom']);
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
			$this->set('current_controller','comptes/admin');
			$this->set('current_controllername','Comptes bancaires');
			$this->set('current_iconview','icons/ajouter.png');
			$this->set('current_view','comptes/add');
			$this->set('current_iconviewname',"Ajouter Un compte");
			$this->set('title_for_layout',"Ajouter Un compte");
	$this->layout = 'admin';
		if($this->request->is('Post'))
		{
			$this->Compte->create();
			$this->request->data['Compte']['user_id'] = $this->Auth->User('id');
			if($this->Compte->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter un compte bancaire";
				$this->request->data['Evennement']['titrear']="إضافة حساب بنكي";
				$this->request->data['Evennement']['titreen']="Add a bank account";
				$this->request->data['Evennement']['logiciel']="Comptes bancaires";
				$this->request->data['Evennement']['logicielar']="حسابات بنكية";
				$this->request->data['Evennement']['logicielen']="Bank accounts";
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
		if($this->Compte->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer un compte bancaire";
				$this->request->data['Evennement']['titrear']="إزالة حساب بنكي";
				$this->request->data['Evennement']['titreen']="Delete a bank account";
				$this->request->data['Evennement']['logiciel']="Comptes bancaires";
				$this->request->data['Evennement']['logicielar']="حسابات بنكية";
				$this->request->data['Evennement']['logicielen']="Bank accounts";
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
			$this->set('current_controller','comptes/admin');
			$this->set('current_controllername','Comptes bancaires');
			$this->set('current_iconview','icons/modifier.png');
			$this->set('current_view','comptes/modifier');
			$this->set('current_iconviewname',"Modification d'Un compte");
			$this->set('title_for_layout',"Modification d'Un compte");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Compte->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide compte'));
		$this->Compte->id=$id;
		
		if(!$this->request->data){
			$this->request->data=$post;
			}
		else{
			if($this->Compte->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier un compte bancaire";
				$this->request->data['Evennement']['titrear']="تعديل حساب بنكي";
				$this->request->data['Evennement']['titreen']="Edit a bank account";
				$this->request->data['Evennement']['logiciel']="Comptes bancaires";
				$this->request->data['Evennement']['logicielar']="حسابات بنكية";
				$this->request->data['Evennement']['logicielen']="Bank accounts";
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
			$this->set('current_controller','comptes/admin');
			$this->set('current_controllername','Comptes bancaires');
			$this->set('current_iconview','icons/rechercher.png');
			$this->set('current_view','comptes/recherche');
			$this->set('current_iconviewname',"Recherche de comptes");
			$this->set('title_for_layout',"Recherche de comptes");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '1')
				$realisation=$this->Compte->find('all',array('conditions'=>array('Compte.id='.$this->request->data['Compte']['ide'])));
			else if($_POST['rechercher'] == '2'){
			$dated=$this->request->data['Compte']['dated']['year']."-".$this->request->data['Compte']['dated']['month']."-".$this->request->data['Compte']['dated']['day'];
			$datef=$this->request->data['Compte']['datef']['year']."-".$this->request->data['Compte']['datef']['month']."-".$this->request->data['Compte']['datef']['day'];
			
			$conditions = array('Compte.dated <=' => $datef, 'Compte.dated >=' => $dated);
			$realisation=$this->Compte->find('all', array('conditions' => $conditions));
				//$realisation=$this->Compte->find('all',array('conditions'=>array('Compte.jusqua BETWEEN '.$dated.' AND '.$datef)));
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
		$post=$this->Compte->findById($id);
			if($post){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer un compte bancaire";
				$this->request->data['Evennement']['titrear']="طباعة حساب مصرفي";
				$this->request->data['Evennement']['titreen']="Print a bank account";
				$this->request->data['Evennement']['logiciel']="Comptes bancaires";
				$this->request->data['Evennement']['logicielar']="حسابات بنكية";
				$this->request->data['Evennement']['logicielen']="Bank accounts";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
				$this->set('title_for_layout',"Compte bancaire");
				$this->set('post',$post);
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
} // fin de "appcontroller"
?>