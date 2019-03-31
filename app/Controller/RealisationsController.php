<?php
App::uses('AppController', 'Controller');

class RealisationsController extends AppController{
	public $helpers = array('Html', 'Form');
	//public $components = array('DebugKit.Toolbar');
	public $uses = array('Realisation','Projet','Evennement');
	public $paginate= array('limit'=>'15','order'=>array('Realisation.id'=>'asc'));
	public $paginatedesc= array('limit'=>'15','order'=>array('Realisation.id'=>'desc'));
	
	public function isAuthorized($user){
		if($user['limites']!=='0' && $user['limites']!=='1' && $user['Realisations']!=='1')
			return false;
		else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Realisation->isOwnedBy($postId,$user['id']))
				return true;
			else if($user['role']!=='admin')
				$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		}
		return parent::isAuthorized($user);
	}
	
	public function index(){
	$this->set('post',$this->Realisation->find('all'));
	
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/index');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/index');
		}
	
	}
	/*public function presentation(){
	$this->set('title_for_layout','Quelque réalisations de votrecodeur.com');
	$this->set('post',$this->Realisation->find('all'));
	$this->set('title_for_layout',"");
	}*/
	public function admin(){
				$this->set('current_icon','icons/accept.png');
				$this->set('current_controller','realisations/admin');
				$this->set('current_controllername','Réalisations');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','realisations/admin');
				$this->set('current_iconviewname',"Administration");
				$this->set('title_for_layout',"Administration");
	$this->layout = 'admin';
		$this->Paginator->settings=$this->paginate;
	if($this->Session->read('tri')=='desc')
		$this->Paginator->settings=$this->paginatedesc;
		$post=$this->Paginator->paginate('Realisation');
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
		$this->redirect(array('action'=>'index'));
	}
	$this->set('title_for_layout',"Liste de Realisations");
	$this->layout = 'imprimer';
		$post=$this->Realisation->find('all');
		$this->set(compact('post'));
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer liste";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Réalisations";
				$this->request->data['Evennement']['logicielar']="الإنجازات";
				$this->request->data['Evennement']['logicielen']="Achievements";
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
	
	public function view($id=null,$titre=null){
	$this->layout = 'admin';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		if(!$titre){
		$this->redirect(array('action'=>'../'));
		}
		$post=$this->Realisation->findById($id);
		if($post){
		$titredetest=$post['Realisation']['titre'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Realisation->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Realisation->findById($id);
			if($post){
				$this->set('current_icon','icons/accept.png');
				$this->set('current_controller','realisations/admin');
				$this->set('current_controllername','Réalisations');
				$this->set('current_iconview','icons/afficher.png');
				$this->set('current_view','realisations/view/'.$id."/".$titre);
				$this->set('current_iconviewname',"Réalisation: ".$post['Realisation']['titre']);
				$this->set('title_for_layout',"Réalisation: ".$post['Realisation']['titre']);
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
		$this->redirect(array('action'=>'index'));
	}
				$this->set('current_icon','icons/accept.png');
				$this->set('current_controller','realisations/admin');
				$this->set('current_controllername','Réalisations');
				$this->set('current_iconview','icons/ajouter.png');
				$this->set('current_view','realisations/add');
				$this->set('current_iconviewname',"Ajouter une réalisation");
				$this->set('title_for_layout',"Ajouter une réalisation");
	$this->layout = 'admin';
		$optionsp = $this->Projet->find('list', array('fields'=> array('Projet.id', 'Projet.nom')));
		$this->set(compact('optionsp'));
		if($this->request->is('Post'))
		{
			$this->Realisation->create();
			$employe=$this->Projet->findById($this->request->data['Realisation']['projet_id']);
			$this->request->data['Realisation']['projet_nom'] = $employe['Projet']['nom'];
			$this->request->data['Realisation']['user_id'] = $this->Auth->User('id');
			if($this->Realisation->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Réalisations";
				$this->request->data['Evennement']['logicielar']="الإنجازات";
				$this->request->data['Evennement']['logicielen']="Achievements";
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
		$this->redirect(array('action'=>'index'));
	}
	$this->layout = 'admin';
		if($this->request->is('get'))
					throw new MethodNotAllowedException();
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		if($this->Realisation->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Réalisations";
				$this->request->data['Evennement']['logicielar']="الإنجازات";
				$this->request->data['Evennement']['logicielen']="Achievements";
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
		$this->redirect(array('action'=>'index'));
	}
				$this->set('current_icon','icons/accept.png');
				$this->set('current_controller','realisations/admin');
				$this->set('current_controllername','Réalisations');
				$this->set('current_iconview','icons/modifier.png');
				$this->set('current_view','realisations/modifier'.$id);
				$this->set('current_iconviewname',"Modification d'une réalisation");
				$this->set('title_for_layout',"Modification d'une réalisation");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Realisation->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide Realisation'));
		$this->Realisation->id=$id;
		$test=0;
		if($this->Session->read('Auth.User.role')== 'admin')
			$test=1;
		else if($this->Session->read('Auth.User.id')==$post['Realisation']['user_id'])
			$test=1;
		
			
		if(!$this->request->data){
			$this->request->data=$post;
			$optionsp = $this->Projet->find('list', array('fields'=> array('Projet.id', 'Projet.nom')));
			$this->set(compact('optionsp'));
			}
		else {
			$employe=$this->Projet->findById($this->request->data['Realisation']['projet_id']);
			$this->request->data['Realisation']['projet_nom'] = $employe['Projet']['nom'];
		if($test==1){
			if($this->Realisation->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Réalisations";
				$this->request->data['Evennement']['logicielar']="الإنجازات";
				$this->request->data['Evennement']['logicielen']="Achievements";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
				$this->Session->setFlash($this->editmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
				$this->redirect(array('action'=>'admin'));
				}
			}else{
				$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
				$this->redirect(array('action'=>'admin'));
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
		$this->redirect(array('action'=>'index'));
	}
				$this->set('current_icon','icons/accept.png');
				$this->set('current_controller','realisations/admin');
				$this->set('current_controllername','Réalisations');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','realisations/recherche');
				$this->set('current_iconviewname',"Recherche de réalisations");
				$this->set('title_for_layout',"Recherche de réalisations");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '3')
				$realisation=$this->Realisation->find('all',array('conditions'=>array('Realisation.id='.$this->request->data['Realisation']['ide'])));
			else if($_POST['rechercher'] == '1'){
				//$realisation=$this->Realisation->find('all',array('conditions'=>array('Realisation.cout='.$this->request->data['Realisation']['couts'])));
				$realisation=$this->Realisation->find('all',array('conditions'=>array('Realisation.cout BETWEEN '.$this->request->data['Realisation']['cout1'].' AND '.$this->request->data['Realisation']['cout2'])));
				
			}
			else if($_POST['rechercher'] == '2'){
			//print_r($this->request->data['Realisation']['apartir']);
			$dated=$this->request->data['Realisation']['apartir']['year']."-".$this->request->data['Realisation']['apartir']['month']."-".$this->request->data['Realisation']['apartir']['day'];
			$datef=$this->request->data['Realisation']['jusqua']['year']."-".$this->request->data['Realisation']['jusqua']['month']."-".$this->request->data['Realisation']['jusqua']['day'];
			
			$conditions = array('Realisation.jusqua <=' => $datef, 'Realisation.jusqua >=' => $dated);
			$realisation=$this->Realisation->find('all', array('conditions' => $conditions));
				//$realisation=$this->Realisation->find('all',array('conditions'=>array('Realisation.jusqua BETWEEN '.$dated.' AND '.$datef)));
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
		$this->redirect(array('action'=>'index'));
	}
	$this->layout = 'imprimer';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		$post=$this->Realisation->findById($id);
		if($post){
			//$post=$this->Realisation->findById($id);
			if($post){
				$this->set('title_for_layout',$post['Realisation']['titre']);
				$this->set('post',$post);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Réalisations";
				$this->request->data['Evennement']['logicielar']="الإنجازات";
				$this->request->data['Evennement']['logicielen']="Achievements";
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