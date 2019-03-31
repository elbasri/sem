<?php
App::uses('AppController', 'Controller');

class DemandesController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Demande','User','Service','Produit','Evennement');
	public $paginate=array('limit'=>'15','order'=>array('Demande.created'=>'asc'));
	public $paginatedesc=array('limit'=>'15','order'=>array('Demande.created'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	public function isAuthorized($user){
	
		if($user['limites']!=='0' && $user['limites']!=='2' && $user['Demandes']!=='1')
			return false;
		else if(isset($user['role']) && $user['role']==='admin')
			return true;
		else if(isset($user['role']) && $user['role']==='client' && in_array($this->action,array('mesdevis'))){
			//$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
			return true;
		}
			
		return parent::isAuthorized($user);
	}
	
	/*public function index(){
		if($this->request->is('Post'))
		{
			$this->Demande->create();
			if($this->Demande->save($this->request->data)){
				$this->Session->setFlash('le Demande a été bien envoyer'));
				return $this->redirect(array('action'=>'index'));
			}
			throw new NotFoundException(_('Erreur:'));
		}
	}*/
	public function nouvelledemande($type=null,$ide=null){
	
	$cle=md5(md5(date("Y/m/d").time()));
	$cle = substr($cle,0,5);
	$this->Session->write('cle',$cle);
	$this->Session->read('cle');
		/*if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		  $ip=$_SERVER['HTTP_CLIENT_IP'];
		}
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else{
		  $ip=$_SERVER['REMOTE_ADDR'];
		}
		echo $ip;*/
		if($this->request->is('Post'))
		{
			$this->Demande->create();
			if($this->Demande->save($this->request->data)){
				$id=$this->Demande->getLastInsertId();
				$this->Demande->id=$id;
				$this->Demande->saveField('ip',$this->request->clientIp());
				if($this->Auth->user()){
								$this->Demande->id=$id;
								$this->Demande->saveField('client_id',$this->Session->read('Auth.User.id'));
							}
				$this->Session->setFlash($this->sendmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
				return $this->redirect(array('action'=>'nouvelledemande'));
			}
			//throw new NotFoundException(_('Erreur:'));
		}
		$this->set('title_for_layout','Demande de devis');
		if($ide && $type){
			if($type=="produit"){
				$service=$this->Produit->findById($ide);
				$this->request->data['Demande']['titre']="Commande du produit: ".$service['Produit']['titre'];
				}
			if($type=="service"){
				$service=$this->Service->findById($ide);
				$this->request->data['Demande']['titre']="Demande de devis pour: ".$service['Service']['titre'];
				}
		}
		if($this->Auth->user()){
								$userdata=$this->User->findById($this->Session->read('Auth.User.id'));
								$this->request->data['Demande']['nom']=$userdata['User']['nom'];
								$this->request->data['Demande']['email']=$userdata['User']['email'];
								$this->request->data['Demande']['tel']=$userdata['User']['tel'];
								$this->request->data['Demande']['societe']=$userdata['User']['societe'];
							}
	}
	public function admin(){
	$this->layout = 'admin';
	//$this->set('post',$this->Demande->find('all',));
	$this->Paginator->settings=$this->paginate;
	if($this->Session->read('tri')=='desc')
		$this->Paginator->settings=$this->paginatedesc;
	
	if($this->Session->read('typedemande')=='br'){
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','demandes/admin');
			$this->set('current_controllername','Demandes');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','demandes/admin');
			$this->set('current_iconviewname','Non lu');
			$this->set('title_for_layout',"Non lu");
		$post=$this->Paginator->paginate('Demande',array('etat'=>0));
		$this->set('title_for_layout',"Demandes non lu");
		}
	else if($this->Session->read('typedemande')=='pb'){
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','demandes/admin');
			$this->set('current_controllername','Demandes');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','demandes/admin');
			$this->set('current_iconviewname','Lu');
			$this->set('title_for_layout',"Lu");
		$post=$this->Paginator->paginate('Demande',array('etat'=>1));
		$this->set('title_for_layout',"Demandes lu");
		}
	else{
		$post=$this->Paginator->paginate('Demande');
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','demandes/admin');
			$this->set('current_controllername','Demandes');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','demandes/admin');
			$this->set('current_iconviewname','Administration');
			$this->set('title_for_layout',"Administration");
		}
	
	$this->set(compact('post'));
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/admin');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/admin');
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
	public function tous($id=null){
		$this->Session->write('typedemande','tous');
		$this->redirect(array('action'=>'admin'));
	}
	public function nonlu($id=null){
		$this->Session->write('typedemande','br');
		$this->redirect(array('action'=>'admin'));
	}
	public function lu($id=null){
		$this->Session->write('typedemande','pb');
		$this->redirect(array('action'=>'admin'));
	}
	
	public function view($id=null,$titre=null){
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','demandes/admin');
			$this->set('current_controllername','Demandes');
			$this->set('current_iconview','icons/afficher.png');
			$this->set('current_view','demandes/view/'.$id."/".$titre);
			$this->set('current_iconviewname','Traitement du demande: '.$titre);
			$this->set('title_for_layout',"Traitement du demande: ".$titre);
	$this->layout = 'admin';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		if(!$titre){
		$this->redirect(array('action'=>'../'));
		}
		$post=$this->Demande->findById($id);
		$titredetest=$post['Demande']['nom'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Demande->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Demande->findById($id);
			if($post){
				$this->Demande->id=$id;
				$this->Demande->saveField('etat','1');
				$this->set('post',$post);
				}
				else
				throw new NotFoundException($this->notfoundmessage);
			}
		else{
			throw new NotFoundException($this->notfoundmessage);
			}
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/view');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/view');
		}

	}
	public function repond($id=null){
	$this->set('title_for_layout',"Répondre à un message");
	$this->layout='admin';
		if(!$id){
			$this->redirect(array('action'=>'admin'));
		}
		//$this->set('post','');
		$post=$this->Demande->findById($id);
		//$titredetest=$post['Demande']['nom'];
			$post=$this->Demande->findById($id);
		if($post){
			if($this->request->is('Post')){
				$letest=1;
				$this->set('letest',$letest);
				$this->set('titre',$post['Demande']['titre']);
				$this->set('nom',$post['Demande']['nom']);
				$this->set('email',$post['Demande']['email']);
				$this->set('details',$this->request->data['Demande']['details']);
				
				$this->Session->setFlash($this->sendmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
				$this->request->data['Demande']['titrer']=$post['Demande']['titre'];
				$this->request->data['Demande']['nomr']=$post['Demande']['nom'];
				$this->request->data['Demande']['emailr']=$post['Demande']['email'];
				}
			else
			{
				$this->request->data['Demande']['titrer']=$post['Demande']['titre'];
				$this->request->data['Demande']['nomr']=$post['Demande']['nom'];
				$this->request->data['Demande']['emailr']=$post['Demande']['email'];
			}
		}
		else
			throw new NotFoundException($this->notfoundmessage);
			
	}
	/*public function add(){
	$this->layout = 'admin';
		if($this->request->is('Post'))
		{
			$this->Demande->create();
			if($this->Demande->save($this->request->data)){
				$this->Session->setFlash('le Demande a été bien enregistrer'));
				return $this->redirect(array('action'=>'index'));
			}
			throw new NotFoundException(_('Erreur:'));
		}
	}*/
	public function supprimer($id=null){
	if($this->Session->read('Auth.User.delete')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'index'));
	}
	$this->layout = 'admin';
		if($this->request->is('get'))
					throw new MethodNotAllowedException();
		if(!$id)
			$this->redirect(array('action'=>'index'));
		if($this->Demande->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Demandes";
				$this->request->data['Evennement']['logicielar']="طلبات";
				$this->request->data['Evennement']['logicielen']="Requests";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
			$this->Session->setFlash($this->delmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
			return $this->redirect(array('action'=>'admin'));
		}
	}
	public function mesdevis($id=null){
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','demandes/admin');
			$this->set('current_controllername','Demandes');
			$this->set('current_iconview','icons/afficher.png');
			$this->set('current_view','demandes/mesdevis');
			$this->set('current_iconviewname','Mes demandes');
			$this->set('title_for_layout',"Mes demandes");
	if($this->Session->read('Auth.User.role')!='client'){
	$this->layout = 'admin';
	}
		$this->set('demande',$this->Demande->find('all',array('conditions'=>array('Demande.client_id'=>$this->Session->read('Auth.User.id')))));
		$this->set('title_for_layout','Mes demandes de Devis');
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/mesdevis');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/mesdevis');
		}

	}
	/*public function modifier($id=null){
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'index'));
		$post=$this->Demande->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide Demande'));
		$this->Demande->id=$id;
		if($this->Demande->save($this->request->data))
			$this->Session->setFlash('le Demande a été bien Modifier'));
		if(!$this->request->data)
			$this->request->data=$post;
	}*/
	
} // fin de "appcontroller"
?>