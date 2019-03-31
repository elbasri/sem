<?php
App::uses('AppController', 'Controller');

class ClientsController extends AppController{
	public $helpers=array('Html','Form');
	public $uses=array('Client','Projet','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Client.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Client.id'=>'desc'));
	
	public function beforeFilter(){
		parent::beforeFilter();
		/*if (!isset($$this->Auth)) {
            debug(get_included_files());
            die;
        }*/
		//$this->Auth->allow('admin');
	}
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Clients']!=='1')
		return false;
	else if(in_array($this->action,array('edit','delete'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Client->isOwnedBy($postId,$user['id']))
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
		
	if($this->Session->read('typecrm')=='f'){
		$users=$this->Paginator->paginate('Client',array('type'=>'fournisseur'));
		$this->set('title_for_layout',"Gestion de fournisseurs");
	
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/fournisseurs');
			$this->set('current_controllername','CRM: Fournisseurs');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','clients/fournisseurs');
			$this->set('current_iconviewname','Administration');
			
		}
	else if($this->Session->read('typecrm')=='c'){
		$users=$this->Paginator->paginate('Client',array('type'=>'client'));
		$this->set('title_for_layout',"Gestion de recepteurs");
	
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/clients');
			$this->set('current_controllername','CRM: Clients');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','clients/clients');
			$this->set('current_iconviewname','Administration');
			
		}
	else if($this->Session->read('typecrm')=='fa'){
		$users=$this->Paginator->paginate('Client',array('type'=>'fabricant'));
		$this->set('title_for_layout',"Gestion de fabricants");
		
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/fabricants');
			$this->set('current_controllername','CRM: Fabricants');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','clients/fabricants');
			$this->set('current_iconviewname','Administration');
			
		}
	else if($this->Session->read('typecrm')=='sm'){
		$users=$this->Paginator->paginate('Client',array('type'=>'societem'));
		$this->set('title_for_layout',"Gestion de Sociétés de maintenance");
		
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/societem');
			$this->set('current_controllername','CRM: Sociétés de maintenance');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','clients/societem');
			$this->set('current_iconviewname','Administration');
			
		}
	else if($this->Session->read('typecrm')=='sa'){
		$users=$this->Paginator->paginate('Client',array('type'=>'societea'));
		$this->set('title_for_layout',"Gestion de Sociétés d'assurance");
		
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/societea');
			$this->set('current_controllername','CRM: Sociétés d\'assurance');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','clients/societea');
			$this->set('current_iconviewname','Administration');
		}
	else if($this->Session->read('typecrm')=='sl'){
		$users=$this->Paginator->paginate('Client',array('type'=>'societel'));
		$this->set('title_for_layout',"Gestion de Sociétés de location");
		
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/societel');
			$this->set('current_controllername','CRM: Sociétés de location');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','clients/societel');
			$this->set('current_iconviewname','Administration');
		}
	else{
		$users=$this->Paginator->paginate('Client',array('type'=>'client'));
		$this->set('title_for_layout',"Gestion de recepteurs");
		}
		
	$this->set(compact('users'));
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/admin');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/admin');
		}

	}
	
	public function view($id=null,$nom=null){
	$this->layout = 'admin';
		if(!$id || !$nom){
			$this->Session->setFlash($this->notfoundmessage);
		}
		else{
			$user=$this->Client->findById($id);
			if($user){
				$user=$this->Client->findById($id);
				$nomx=Inflector::slug($user['Client']['nom'],$remplacement='_');
				if($nom=$nomx){
					$this->set('user',$this->Client->read(null,$id));
					$this->set('title_for_layout',"Société: ".$user['Client']['nom']." Contact: ".$user['Client']['prenom']);
						if($this->Session->read('typecrm')=='f'){
	
								$this->set('current_icon','icons/user_suit.png');
								$this->set('current_controller','clients/fournisseurs');
								$this->set('current_controllername','CRM: Fournisseurs');
								$this->set('current_iconview','icons/afficher.png');
								$this->set('current_view','clients/view/'.$id."/".$nomx);
								$this->set('current_iconviewname',"Société: ".$user['Client']['nom']." Contact: ".$user['Client']['prenom']);
								
							}
						else if($this->Session->read('typecrm')=='fa'){
							
								$this->set('current_icon','icons/user_suit.png');
								$this->set('current_controller','clients/fabricants');
								$this->set('current_controllername','CRM: Fabricants');
								$this->set('current_iconview','icons/afficher.png');
								$this->set('current_view','clients/view/'.$id."/".$nomx);
								$this->set('current_iconviewname',"Société: ".$user['Client']['nom']." Contact: ".$user['Client']['prenom']);
								
							}
						else if($this->Session->read('typecrm')=='sm'){
							
								$this->set('current_icon','icons/user_suit.png');
								$this->set('current_controller','clients/societem');
								$this->set('current_controllername','CRM: Sociétés de maintenance');
								$this->set('current_iconview','icons/afficher.png');
								$this->set('current_view','clients/view/'.$id."/".$nomx);
								$this->set('current_iconviewname',"Société: ".$user['Client']['nom']." Contact: ".$user['Client']['prenom']);
								
							}
						else if($this->Session->read('typecrm')=='sa'){
								$this->set('current_icon','icons/user_suit.png');
								$this->set('current_controller','clients/societea');
								$this->set('current_controllername','CRM: Sociétés d\'assurance');
								$this->set('current_iconview','icons/afficher.png');
								$this->set('current_view','clients/view/'.$id."/".$nomx);
								$this->set('current_iconviewname',"Société: ".$user['Client']['nom']." Contact: ".$user['Client']['prenom']);
							}
						else if($this->Session->read('typecrm')=='sl'){
							
								$this->set('current_icon','icons/user_suit.png');
								$this->set('current_controller','clients/societel');
								$this->set('current_controllername','CRM: Sociétés de location');
								$this->set('current_iconview','icons/afficher.png');
								$this->set('current_view','clients/view/'.$id."/".$nomx);
								$this->set('current_iconviewname',"Société: ".$user['Client']['nom']." Contact: ".$user['Client']['prenom']);
							}
						else {
						
								$this->set('current_icon','icons/user_suit.png');
								$this->set('current_controller','clients/clients');
								$this->set('current_controllername','CRM: Clients');
								$this->set('current_iconview','icons/afficher.png');
								$this->set('current_view','clients/view/'.$id."/".$nomx);
								$this->set('current_iconviewname',"Société: ".$user['Client']['nom']." Contact: ".$user['Client']['prenom']);
								
							}
				}
				else
					$this->Session->setFlash($this->notfoundmessage);
			}
			else
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
	$this->set('title_for_layout',"Ajouter un contact");
	$this->layout='admin';
	if($this->Session->read('typecrm')=='f'){
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/fournisseurs');
			$this->set('current_controllername','CRM: Fournisseurs');
			$this->set('current_iconview','icons/ajouter.png');
			$this->set('current_view','clients/add');
			$this->set('current_iconviewname','Ajouter un fournisseur');
			$this->set('title_for_layout',"Ajouter un fournisseur");
		}
	else if($this->Session->read('typecrm')=='c'){
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/clients');
			$this->set('current_controllername','CRM: Clients');
			$this->set('current_iconview','icons/ajouter.png');
			$this->set('current_view','clients/add');
			$this->set('current_iconviewname','Ajouter un client');
			$this->set('title_for_layout',"Ajouter un client");
		}
	else if($this->Session->read('typecrm')=='fa'){
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/fabricants');
			$this->set('current_controllername','CRM: Fabricants');
			$this->set('current_iconview','icons/ajouter.png');
			$this->set('current_view','clients/add');
			$this->set('current_iconviewname','Ajouter un fabricant');
			$this->set('title_for_layout',"Ajouter un fabricant");
		}
	else if($this->Session->read('typecrm')=='sm'){
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/societem');
			$this->set('current_controllername','CRM: Sociétés de maintenance');
			$this->set('current_iconview','icons/ajouter.png');
			$this->set('current_view','clients/add');
			$this->set('current_iconviewname','Ajouter une sociétés de maintenance');
			$this->set('title_for_layout',"Ajouter une sociétés de maintenance");
		}
	else if($this->Session->read('typecrm')=='sa'){
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/societea');
			$this->set('current_controllername','CRM: Sociétés d\'assurance');
			$this->set('current_iconview','icons/ajouter.png');
			$this->set('current_view','clients/add');
			$this->set('current_iconviewname','Ajouter une sociétés d\'assurance');
			$this->set('title_for_layout',"Ajouter une sociétés d'assurance");
		}
	else if($this->Session->read('typecrm')=='sl'){
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/societel');
			$this->set('current_controllername','CRM: Sociétés de location');
			$this->set('current_iconview','icons/ajouter.png');
			$this->set('current_view','clients/add');
			$this->set('current_iconviewname','Ajouter une sociétés de location');
			$this->set('title_for_layout',"Ajouter une sociétés de location");
		}
		if($this->request->is('Post')){
		
			$this->Client->create();
				if($this->Session->read('typecrm')=='f')
					$this->request->data['Client']['type'] = 'fournisseur';
				else if($this->Session->read('typecrm')=='fa')
					$this->request->data['Client']['type'] = 'fabricant';
				else if($this->Session->read('typecrm')=='sm')
					$this->request->data['Client']['type'] = 'societem';
				else if($this->Session->read('typecrm')=='sa')
					$this->request->data['Client']['type'] = 'societea';
				else if($this->Session->read('typecrm')=='sl')
					$this->request->data['Client']['type'] = 'societel';
				else
					$this->request->data['Client']['type'] = 'client';
				$this->request->data['Client']['user_id'] = $this->Auth->User('id');
			if($this->Client->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter un contact";
				$this->request->data['Evennement']['titrear']="إضافة جهة إتصال";
				$this->request->data['Evennement']['titreen']="Add a contact";
				$this->request->data['Evennement']['logiciel']="CRM et Contacts";
				$this->request->data['Evennement']['logicielar']="علاقات وعملاء";
				$this->request->data['Evennement']['logicielen']="CRM and contacts";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
				$this->Session->setFlash($this->addmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
			}
			else
				$this->Session->setFlash($this->errormessage);
		}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/add');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/add');
		}

	}
	public function edit($id=null){
	if($this->Session->read('Auth.User.edit')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
				if($this->Session->read('typecrm')=='f'){
						$this->set('current_icon','icons/user_suit.png');
						$this->set('current_controller','clients/fournisseurs');
						$this->set('current_controllername','CRM: Fournisseurs');
						$this->set('current_iconview','icons/modifier.png');
						$this->set('current_view','clients/edit/'.$id);
						$this->set('current_iconviewname','Modification d\'un fournisseur');
						$this->set('title_for_layout',"Modification du fournisseur");
					}
				else if($this->Session->read('typecrm')=='c'){
						$this->set('current_icon','icons/user_suit.png');
						$this->set('current_controller','clients/clients');
						$this->set('current_controllername','CRM: Clients');
						$this->set('current_iconview','icons/modifier.png');
						$this->set('current_view','clients/edit/'.$id);
						$this->set('current_iconviewname','Modification d\'un client');
						$this->set('title_for_layout',"Modification du client");
					}
				else if($this->Session->read('typecrm')=='fa'){
						$this->set('current_icon','icons/user_suit.png');
						$this->set('current_controller','clients/fabricants');
						$this->set('current_controllername','CRM: Fabricants');
						$this->set('current_iconview','icons/modifier.png');
						$this->set('current_view','clients/edit/'.$id);
						$this->set('current_iconviewname','Modification d\'un fabricant');
						$this->set('title_for_layout',"Modification du fabricant");
					}
				else if($this->Session->read('typecrm')=='sm'){
						$this->set('current_icon','icons/user_suit.png');
						$this->set('current_controller','clients/societem');
						$this->set('current_controllername','CRM: Sociétés de maintenance');
						$this->set('current_iconview','icons/modifier.png');
						$this->set('current_view','clients/edit/'.$id);
						$this->set('current_iconviewname','Modification d\'une société de maintenance');
						$this->set('title_for_layout',"Modification de sociétés de maintenance");
					}
				else if($this->Session->read('typecrm')=='sa'){
						$this->set('current_icon','icons/user_suit.png');
						$this->set('current_controller','clients/societea');
						$this->set('current_controllername','CRM: Sociétés d\'assurance');
						$this->set('current_iconview','icons/modifier.png');
						$this->set('current_view','clients/edit/'.$id);
						$this->set('current_iconviewname','Modification d\'une société d\'assurance');
						$this->set('title_for_layout',"Modification de sociétés d'assurance");
					}
				else if($this->Session->read('typecrm')=='sl'){
						$this->set('current_icon','icons/user_suit.png');
						$this->set('current_controller','clients/societel');
						$this->set('current_controllername','CRM: Sociétés de location');
						$this->set('current_iconview','icons/modifier.png');
						$this->set('current_view','clients/edit/'.$id);
						$this->set('current_iconviewname','Modification d\'une société de location');
						$this->set('title_for_layout',"Modification de sociétés de location");
					}
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Client->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide contact'));
		$this->Client->id=$id;
		if(!$this->request->data)
			$this->request->data=$post;
		else if($this->Client->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier un contact";
				$this->request->data['Evennement']['titrear']="تعديل جهة إتصال";
				$this->request->data['Evennement']['titreen']="Edit a contact";
				$this->request->data['Evennement']['logiciel']="CRM et Contacts";
				$this->request->data['Evennement']['logicielar']="علاقات وعملاء";
				$this->request->data['Evennement']['logicielen']="CRM and contacts";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
			$this->Session->setFlash($this->editmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
			}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/edit');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/edit');
		}

	}
	public function delete($id=null){
	if($this->Session->read('Auth.User.delete')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->layout = 'admin';
		if($this->request->is('get'))
					throw new MethodNotAllowedException();
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		if($this->Client->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer un contact";
				$this->request->data['Evennement']['titrear']="إزالة جهة إتصال";
				$this->request->data['Evennement']['titreen']="Delete a contact";
				$this->request->data['Evennement']['logiciel']="CRM et Contacts";
				$this->request->data['Evennement']['logicielar']="علاقات وعملاء";
				$this->request->data['Evennement']['logicielen']="CRM and contacts";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
			$this->Session->setFlash($this->delmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
			return $this->redirect(array('action'=>'admin'));
		}
	}
	
	/*public function contacter($iduser=null){
		if($iduser){
			$user=$this->Client->findById($iduser);
			if(!empty($user['Client']['email'])){
							$this->Client->id=$iduser;
							$letest=1;
							$this->set('letest',$letest);
							$this->set('nom',$user['Client']['nom']);
							$this->set('prenom',$user['Client']['prenom']);
							$this->set('email',$user['Client']['email']);
							$this->set('username',$user['Client']['username']);
							//$this->Session->setFlash('gagas:'.$user['User']['nom'].$user['User']['email'].$user['User']['username']));
				}
		}
		
	}*/
	public function recherche(){
	if($this->Session->read('Auth.User.recherche')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
		if($this->Session->read('typecrm')=='f'){
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/fournisseurs');
			$this->set('current_controllername','CRM: Fournisseurs');
			$this->set('current_iconview','icons/rechercher.png');
			$this->set('current_view','client/recherche');
			$this->set('current_iconviewname','Recherche de fournisseurs');
			$this->set('title_for_layout',"Recherche de fournisseurs");
		}
	else if($this->Session->read('typecrm')=='c'){
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/clients');
			$this->set('current_controllername','CRM: Clients');
			$this->set('current_iconview','icons/rechercher.png');
			$this->set('current_view','client/recherche');
			$this->set('current_iconviewname','Recherche de clients');
			$this->set('title_for_layout',"Recherche de clients");
		}
	else if($this->Session->read('typecrm')=='fa'){
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/fabricants');
			$this->set('current_controllername','CRM: Fabricants');
			$this->set('current_iconview','icons/rechercher.png');
			$this->set('current_view','client/recherche');
			$this->set('current_iconviewname','Recherche de fabricants');
			$this->set('title_for_layout',"Recherche de fabricants");
		}
	else if($this->Session->read('typecrm')=='sm'){
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/societem');
			$this->set('current_controllername','CRM: Sociétés de maintenance');
			$this->set('current_iconview','icons/rechercher.png');
			$this->set('current_view','client/recherche');
			$this->set('current_iconviewname','Recherche de sociétés de maintenance');
			$this->set('title_for_layout',"Recherche de sociétés de maintenance");
		}
	else if($this->Session->read('typecrm')=='sa'){
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/societea');
			$this->set('current_controllername','CRM: Sociétés d\'assurance');
			$this->set('current_iconview','icons/rechercher.png');
			$this->set('current_view','client/recherche');
			$this->set('current_iconviewname','Recherche de sociétés d\'assurance');
			$this->set('title_for_layout',"Recherche de sociétés d\'assurance");
		}
	else if($this->Session->read('typecrm')=='sl'){
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/societel');
			$this->set('current_controllername','CRM: Sociétés de location');
			$this->set('current_iconview','icons/rechercher.png');
			$this->set('current_view','client/recherche');
			$this->set('current_iconviewname','Recherche de sociétés de location');
			$this->set('title_for_layout',"Recherche de sociétés de location");
		}
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$employe;
			if($_POST['rechercher'] == '1'){
				$cle=$this->request->data['Client']['nom1'];
				if($this->Session->read('typecrm')=='f')
					$employe=$this->Client->find('all',array('conditions'=>array('OR' => array('Client.nom LIKE' => "%$cle%"),'Client.type = "fournisseur"')));
				else if($this->Session->read('typecrm')=='fa')
					$employe=$this->Client->find('all',array('conditions'=>array('OR' => array('Client.nom LIKE' => "%$cle%"),'Client.type = "fabricant"')));
				else if($this->Session->read('typecrm')=='sm')
					$employe=$this->Client->find('all',array('conditions'=>array('OR' => array('Client.nom LIKE' => "%$cle%"),'Client.type = "societem"')));
				else if($this->Session->read('typecrm')=='sa')
					$employe=$this->Client->find('all',array('conditions'=>array('OR' => array('Client.nom LIKE' => "%$cle%"),'Client.type = "societea"')));
				else if($this->Session->read('typecrm')=='sl')
					$employe=$this->Client->find('all',array('conditions'=>array('OR' => array('Client.nom LIKE' => "%$cle%"),'Client.type = "societel"')));
				else
					$employe=$this->Client->find('all',array('conditions'=>array('OR' => array('Client.nom LIKE' => "%$cle%"),'Client.type = "client"')));
				}
			else if($_POST['rechercher'] == '2'){
				$cle=$this->request->data['Client']['nom2'];
				if($this->Session->read('typecrm')=='f')
					$employe=$this->Client->find('all',array('conditions'=>array('OR' => array('Client.prenom LIKE' => "%$cle%",'Client.type = "fournisseur"'))));
				else if($this->Session->read('typecrm')=='fa')
					$employe=$this->Client->find('all',array('conditions'=>array('OR' => array('Client.prenom LIKE' => "%$cle%",'Client.type = "fabricant"'))));
				else if($this->Session->read('typecrm')=='sm')
					$employe=$this->Client->find('all',array('conditions'=>array('OR' => array('Client.prenom LIKE' => "%$cle%",'Client.type = "societem"'))));
				else if($this->Session->read('typecrm')=='sa')
					$employe=$this->Client->find('all',array('conditions'=>array('OR' => array('Client.prenom LIKE' => "%$cle%",'Client.type = "societea"'))));
				else if($this->Session->read('typecrm')=='sl')
					$employe=$this->Client->find('all',array('conditions'=>array('OR' => array('Client.prenom LIKE' => "%$cle%",'Client.type = "societel"'))));
				else
					$employe=$this->Client->find('all',array('conditions'=>array('OR' => array('Client.prenom LIKE' => "%$cle%",'Client.type = "client"'))));
				}
			else if($_POST['rechercher'] == '3'){
				if($this->Session->read('typecrm')=='f')
					$employe=$this->Client->find('all',array('conditions'=>array('Client.type = "fournisseur"','Client.email="'.$this->request->data['Client']['email'].'"')));
				if($this->Session->read('typecrm')=='fa')
					$employe=$this->Client->find('all',array('conditions'=>array('Client.type = "fabricant"','Client.email="'.$this->request->data['Client']['email'].'"')));
				else if($this->Session->read('typecrm')=='sm')
					$employe=$this->Client->find('all',array('conditions'=>array('Client.type = "societem"','Client.email="'.$this->request->data['Client']['email'].'"')));
				else if($this->Session->read('typecrm')=='sa')
					$employe=$this->Client->find('all',array('conditions'=>array('Client.type = "societea"','Client.email="'.$this->request->data['Client']['email'].'"')));
				else if($this->Session->read('typecrm')=='sl')
					$employe=$this->Client->find('all',array('conditions'=>array('Client.type = "societel"','Client.email="'.$this->request->data['Client']['email'].'"')));
				else
					$employe=$this->Client->find('all',array('conditions'=>array('Client.type = "client"','Client.email="'.$this->request->data['Client']['email'].'"')));
				}
			else if($_POST['rechercher'] == '5'){
				if($this->Session->read('typecrm')=='f')
					$employe=$this->Client->find('all',array('conditions'=>array('Client.type = "fournisseur"','Client.id='.$this->request->data['Client']['ide'])));
				else if($this->Session->read('typecrm')=='fa')
					$employe=$this->Client->find('all',array('conditions'=>array('Client.type = "fabricant"','Client.id='.$this->request->data['Client']['ide'])));
				else if($this->Session->read('typecrm')=='sm')
					$employe=$this->Client->find('all',array('conditions'=>array('Client.type = "societem"','Client.id='.$this->request->data['Client']['ide'])));
				else if($this->Session->read('typecrm')=='sa')
					$employe=$this->Client->find('all',array('conditions'=>array('Client.type = "societea"','Client.id='.$this->request->data['Client']['ide'])));
				else if($this->Session->read('typecrm')=='sl')
					$employe=$this->Client->find('all',array('conditions'=>array('Client.type = "societel"','Client.id='.$this->request->data['Client']['ide'])));
				else
					$employe=$this->Client->find('all',array('conditions'=>array('Client.type = "client"','Client.id='.$this->request->data['Client']['ide'])));
				}
			$this->set(compact('employe', 'test'));
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
	public function projets(){
			$this->set('current_icon','icons/user_suit.png');
			$this->set('current_controller','clients/projets');
			$this->set('current_controllername','CRM: Projets');
			$this->set('current_iconview','icons/folder.png');
			$this->set('current_view','client/projets');
			$this->set('current_iconviewname','Les projets des clients');
			$this->set('title_for_layout',"Les projets des clients");
	$this->layout = 'admin';
		$this->Paginator->settings=$this->paginate;
		$users=$this->Paginator->paginate('Client');
		$projets=$this->Projet->find('all',array('conditions'=>array('Projet.client_id != 0')));
		$this->set(compact('users','projets'));
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/projets');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/projets');
		}

	}
	public function imprimer($id=null,$pdf=null){
	if($this->Session->read('Auth.User.imprimer')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
		if($this->Session->read('typecrm')=='f'){
			$this->set('title_for_layout',"Rapport du fournisseur");
		}
		else if($this->Session->read('typecrm')=='c'){
			$this->set('title_for_layout',"Rapport du client");
		}
		else if($this->Session->read('typecrm')=='fa'){
			$this->set('title_for_layout',"Rapport du fabricant");
			}
		else if($this->Session->read('typecrm')=='sm')
			$this->set('title_for_layout',"Rapport de sociétés de maintenance");
		else if($this->Session->read('typecrm')=='sa')
			$this->set('title_for_layout',"Rapport de sociétés d'assurance");
		else if($this->Session->read('typecrm')=='sl')
			$this->set('title_for_layout',"Rapport de sociétés de location");
		else{
			$this->set('title_for_layout',"Rapport du client");
			}
	$this->layout = 'imprimer';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		$post=$this->Client->findById($id);
		if($post){
			//$post=$this->Client->findById($id);
			if($post){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer un contact";
				$this->request->data['Evennement']['titrear']="طباعة جهة إتصال";
				$this->request->data['Evennement']['titreen']="Print a contact";
				$this->request->data['Evennement']['logiciel']="CRM et Contacts";
				$this->request->data['Evennement']['logicielar']="علاقات وعملاء";
				$this->request->data['Evennement']['logicielen']="CRM and contacts";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
				$this->set('user',$post);
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
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer une liste de contacts";
				$this->request->data['Evennement']['titrear']="طباعة قائمة إتصال";
				$this->request->data['Evennement']['titreen']="Print a list of contacts";
				$this->request->data['Evennement']['logiciel']="CRM et Contacts";
				$this->request->data['Evennement']['logicielar']="علاقات وعملاء";
				$this->request->data['Evennement']['logicielen']="CRM and contacts";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
	$this->layout = 'imprimer';
	
		if($this->Session->read('typecrm')=='f'){
			$this->set('title_for_layout',"Liste de fournisseurs");
			$users=$this->Client->find('all',array('conditions'=>array('Client.type = "fournisseur"')));
		}
		else if($this->Session->read('typecrm')=='c'){
			$this->set('title_for_layout',"Liste des recepteurs");
			$users=$this->Client->find('all',array('conditions'=>array('Client.type = "client"')));
		}
		else if($this->Session->read('typecrm')=='fa'){
			$users=$this->Client->find('all',array('conditions'=>array('type'=>'fabricant')));
			$this->set('title_for_layout',"Gestion de fabricants");
			}
		else if($this->Session->read('typecrm')=='sm'){
			$users=$this->Client->find('all',array('conditions'=>array('type'=>'societem')));
			$this->set('title_for_layout',"Gestion de Sociétés de maintenance");
			}
		else if($this->Session->read('typecrm')=='sa'){
			$users=$this->Client->find('all',array('conditions'=>array('type'=>'societea')));
			$this->set('title_for_layout',"Gestion de Sociétés d'assurance");
			}
		else if($this->Session->read('typecrm')=='sl'){
			$users=$this->Client->find('all',array('conditions'=>array('type'=>'societel')));
			$this->set('title_for_layout',"Gestion de Sociétés de location");
			}
		else{
			$users=$this->Client->find('all',array('conditions'=>array('type'=>'client')));
			$this->set('title_for_layout',"Gestion de recepteurs");
			}
		$this->set(compact('users'));
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
	public function imprimerlisteprojets($id=null){
	if($this->Session->read('Auth.User.imprimerliste')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer une liste de projets";
				$this->request->data['Evennement']['titrear']="طباعة قائمة مشروعات";
				$this->request->data['Evennement']['titreen']="Print a list of projects";
				$this->request->data['Evennement']['logiciel']="CRM et Contacts";
				$this->request->data['Evennement']['logicielar']="علاقات وعملاء";
				$this->request->data['Evennement']['logicielen']="CRM and contacts";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
	$this->set('title_for_layout',"Liste de Projets des clients");
	$this->layout = 'imprimer';
		$users=$this->Client->find('all');
		$projets=$this->Projet->find('all',array('conditions'=>array('Projet.client_id != 0')));
		$this->set(compact('users','projets'));
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/imprimerlisteprojets');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/imprimerlisteprojets');
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
	public function fournisseurs($id=null){
		$this->Session->write('typecrm','f');
		$this->redirect(array('action'=>'admin'));
	}
	public function clients($id=null){
		$this->Session->write('typecrm','c');
		$this->redirect(array('action'=>'admin'));
	}
	public function fabricants($id=null){
		$this->Session->write('typecrm','fa');
		$this->redirect(array('action'=>'admin'));
	}
	public function societem($id=null){
		$this->Session->write('typecrm','sm');
		$this->redirect(array('action'=>'admin'));
	}
	public function societea($id=null){
		$this->Session->write('typecrm','sa');
		$this->redirect(array('action'=>'admin'));
	}
	public function societel($id=null){
		$this->Session->write('typecrm','sl');
		$this->redirect(array('action'=>'admin'));
	}
	
	
	public function imprimerlisteclient($id=null){
		$this->Session->write('typecrm','c');
		if($id)
			$this->redirect(array('action'=>'imprimerliste/pdf'));
		else
			$this->redirect(array('action'=>'imprimerliste'));
	}
	public function imprimerlistefournisseur($id=null){
		$this->Session->write('typecrm','f');
		if($id)
			$this->redirect(array('action'=>'imprimerliste/pdf'));
		else
			$this->redirect(array('action'=>'imprimerliste'));
	}
	public function imprimerlistefabricant($id=null){
		$this->Session->write('typecrm','fa');
		if($id)
			$this->redirect(array('action'=>'imprimerliste/pdf'));
		else
			$this->redirect(array('action'=>'imprimerliste'));
	}
	public function imprimerlistesm($id=null){
		$this->Session->write('typecrm','sm');
		if($id)
			$this->redirect(array('action'=>'imprimerliste/pdf'));
		else
			$this->redirect(array('action'=>'imprimerliste'));
	}
	public function imprimerlistesa($id=null){
		$this->Session->write('typecrm','sa');
		if($id)
			$this->redirect(array('action'=>'imprimerliste/pdf'));
		else
			$this->redirect(array('action'=>'imprimerliste'));
	}
	public function imprimerlistesl($id=null){
		$this->Session->write('typecrm','sl');
		if($id)
			$this->redirect(array('action'=>'imprimerliste/pdf'));
		else
			$this->redirect(array('action'=>'imprimerliste'));
	}
	public function contacts(){}
}
?>
