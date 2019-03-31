<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController{
	public $helpers=array('Html','Form');
	public $uses=array('User','Service','Demande','Produit','Realisation','Client','Employe','Projet','Consultation','Materiel','Maintenance','Inventaire','Devise','Facture','Commande','Contrat','Vacance','Depense','Recette','Stockaction','Tache','Statut','Prime','Paie','Saisir','Kilometrage','Deplacement','Evennement','Stockcategorie');
	public $paginate= array('limit'=>'15','order'=>array('User.id'=>'asc'));
	public $paginatedesc= array('limit'=>'15','order'=>array('User.id'=>'desc'));

	public function beforeFilter(){
		parent::beforeFilter();
		/*if (!isset($$this->Auth)) {
            debug(get_included_files());
            die;
        }*/
		//$this->Auth->allow('admin');
	}
	
	public function isAuthorized($user){
	
		if(isset($user['role']) && $user['role']==='admin' || in_array($this->action,array('logout','edit','login')))
			return true;
		else if((isset($user['role']) && $user['role']==='moderateur') && in_array($this->action,array('profile','passe','mesdevis','accueil','site','entreprise')))
			return true;
		else if((isset($user['role']) && $user['role']==='client') && in_array($this->action,array('profile','passe','mesdevis'))){
			//$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
			return true;
		}
		else
			return false;
			
		return parent::isAuthorized($user);
	}
	
	public function admin(){
			
	//$this->Session->write('type','accueil');
	$this->layout = 'admin';
		$this->Paginator->settings=$this->paginate;
	if($this->Session->read('tri')=='desc')
		$this->Paginator->settings=$this->paginatedesc;
		
	if($this->Session->read('typeuser')=='admin'){
		$users=$this->Paginator->paginate('User',array('role'=>'admin'));
			$this->set('current_icon','icons/group.png');
			$this->set('current_controller','users/admin');
			$this->set('current_controllername','Utilisateurs');
			$this->set('current_iconview','icons/table_multiple.png');
			$this->set('current_view','users/admin');
			$this->set('current_iconviewname',"Administrateurs");
			$this->set('title_for_layout',"Administrateurs");
		}
	else if($this->Session->read('typeuser')=='employe'){
		$users=$this->Paginator->paginate('User',array('role'=>'moderateur'));
			$this->set('current_icon','icons/group.png');
			$this->set('current_controller','users/admin');
			$this->set('current_controllername','Utilisateurs');
			$this->set('current_iconview','icons/table_multiple.png');
			$this->set('current_view','users/employe');
			$this->set('current_iconviewname',"Modérateur");
			$this->set('title_for_layout',"Modérateur");
		}
	else if($this->Session->read('typeuser')=='client'){
		$users=$this->Paginator->paginate('User',array('role'=>'client'));
			$this->set('current_icon','icons/group.png');
			$this->set('current_controller','users/admin');
			$this->set('current_controllername','Utilisateurs');
			$this->set('current_iconview','icons/table_multiple.png');
			$this->set('current_view','users/client');
			$this->set('current_iconviewname',"Clients");
			$this->set('title_for_layout',"Clients");
		}
	else if($this->Session->read('typeuser')=='actives'){
		$users=$this->Paginator->paginate('User',array('etat'=>1));
			$this->set('current_icon','icons/group.png');
			$this->set('current_controller','users/admin');
			$this->set('current_controllername','Utilisateurs');
			$this->set('current_iconview','icons/table_multiple.png');
			$this->set('current_view','users/actives');
			$this->set('current_iconviewname',"Utilisateurs actives");
			$this->set('title_for_layout',"Utilisateurs actives");
		}
	else if($this->Session->read('typeuser')=='inactives'){
		$users=$this->Paginator->paginate('User',array('etat'=>0));
			$this->set('current_icon','icons/group.png');
			$this->set('current_controller','users/admin');
			$this->set('current_controllername','Utilisateurs');
			$this->set('current_iconview','icons/table_multiple.png');
			$this->set('current_view','users/inactives');
			$this->set('current_iconviewname',"Utilisateurs inactives");
			$this->set('title_for_layout',"Utilisateurs inactives");
		}
	else{
			$this->set('current_icon','icons/group.png');
			$this->set('current_controller','users/admin');
			$this->set('current_controllername','Utilisateurs');
			$this->set('current_iconview','icons/table_multiple.png');
			$this->set('current_view','users/admin');
			$this->set('current_iconviewname','Administration');
		$users=$this->Paginator->paginate('User');
		$this->set('title_for_layout',"Gestion d'utilisateurs");
		}
		$this->set(compact('users'));
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
		$this->Session->write('typeuser','tous');
		$this->redirect(array('action'=>'admin'));
	}
	public function admins($id=null){
		$this->Session->write('typeuser','admin');
		$this->redirect(array('action'=>'admin'));
	}
	public function employes($id=null){
		$this->Session->write('typeuser','employe');
		$this->redirect(array('action'=>'admin'));
	}
	public function clients($id=null){
		$this->Session->write('typeuser','client');
		$this->redirect(array('action'=>'admin'));
	}
	public function actives($id=null){
		$this->Session->write('typeuser','actives');
		$this->redirect(array('action'=>'admin'));
	}
	public function inactives($id=null){
		$this->Session->write('typeuser','inactives');
		$this->redirect(array('action'=>'admin'));
	}
	
	public function profile(){
	$this->Session->write('type','accueil');
	$this->layout='admin';
		$id=$this->Session->read('Auth.User.id');
		$users=$this->User->findById($id);
		if($users){
			$this->set(compact('users'));
			$this->set('title_for_layout',$users['User']['username']);
			
			$this->set('current_icon','icons/group.png');
			$this->set('current_controller','users/admin');
			$this->set('current_controllername','Utilisateurs');
			$this->set('current_iconview','icons/user_gray.png');
			$this->set('current_view','users/profile');
			$this->set('current_iconviewname',$users['User']['username']);
			
			}
		else
			$this->Session->setFlash($this->errormessage);
	}
	public function view($id=null,$username=null){
	$this->Session->write('type','accueil');
	$this->layout = 'admin';
		if(!$id || !$username){
			$this->Session->setFlash($this->notfoundmessage);
		}
		else{
			$user=$this->User->findById($id);
			if($user){
				$nom=Inflector::slug($user['User']['username'],$remplacement='_');
				if($username=$nom){
					$this->set('user',$this->User->read(null,$id));
					$this->set('title_for_layout',$user['User']['username']);
					
			$this->set('current_icon','icons/group.png');
			$this->set('current_controller','users/admin');
			$this->set('current_controllername','Utilisateurs');
			$this->set('current_iconview','icons/user_gray.png');
			$this->set('current_view','users/view/'.$id."/".$nom);
			$this->set('current_iconviewname',$user['User']['username']);
			
				}
				else
					$this->Session->setFlash($this->notfoundmessage);
			}
			else
				throw new NotFoundException($this->notfoundmessage);
		}
	}
	public function add(){
	$ref=$this->Session->read('ref');
	$limites=$this->Statut->find('first',array('conditions'=>array('Statut.ref ='=>$ref)));
	$nombre = $this->User->find('count',array('conditions'=>array('role ="admin" or role ="moderateur"')));
	if($limites['Statut']['limites']<=$nombre){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	else{
		$this->request->data['User']['ref']=$ref;
	}
	$this->Session->write('type','accueil');
	$this->set('title_for_layout',"Ajouter un utilisateur");
	
			$this->set('current_icon','icons/group.png');
			$this->set('current_controller','users/admin');
			$this->set('current_controllername','Utilisateurs');
			$this->set('current_iconview','icons/user_add.png');
			$this->set('current_view','users/add');
			$this->set('current_iconviewname','Ajouter un utilisateur');
			
	$this->layout='admin';
		if($this->request->is('Post')){
			$this->User->create();
			$this->request->data['User']['user_id'] = $this->Auth->User('id');
			$drole=$this->request->data['User']['role'];
			$role=$this->Auth->User('role');
			if($role!='admin'){
				$this->request->data['User']['role']='client';
			}
			if($this->User->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Utilisateurs";
				$this->request->data['Evennement']['logicielar']="المستخدمين";
				$this->request->data['Evennement']['logicielen']="Users";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
			
				$this->Session->setFlash($this->addmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
			}
			else
				$this->Session->setFlash($this->errormessage);
		}
	}
	public function enregistrer(){
	//$this->layout='admin';
	if($this->Auth->user()){
			$this->redirect(array('action'=>'profile'));
			}
		if($this->request->is('Post')){
			$this->User->create();
			$this->request->data['User']['user_id'] = $this->Auth->User('id');
			$this->request->data['User']['role']='client';
			$this->request->data['User']['etat']=1;
			$this->request->data['User']['ref']=$this->Session->read('ref');
			if(!empty($this->request->data['User']['username'])){
			if($this->User->save($this->request->data)){
				$iduser=$id=$this->User->getLastInsertId();
				$this->Session->setFlash($this->okusermessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
				$this->redirect(array('action'=>'login',$iduser));
			}
			else
				$this->Session->setFlash($this->errormessage);
				}
		}
		$this->set('title_for_layout',"Créer un Compte d'utilisateur");
	}
	public function edit($id=null){
	if($this->Session->read('lerole')=='client'){
		$ref=$this->Session->read('ref');
		$limites=$this->Statut->find('first',array('conditions'=>array('Statut.ref ='=>$ref)));
		$nombre = $this->User->find('count',array('conditions'=>array('role ="admin" or role ="moderateur"')));
		if($limites['Statut']['limites']<=$nombre){
			if($this->request->data['User']['role']!='client'){
				$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
				$this->redirect(array('action'=>'admin'));
			}
		}
	}
			$this->set('current_icon','icons/group.png');
			$this->set('current_controller','users/admin');
			$this->set('current_controllername','Utilisateurs');
			$this->set('current_iconview','icons/user_add.png');
			$this->set('current_view','users/add');
			$this->set('current_iconviewname','Modification du profile d\'utilisateur');
			
	$this->layout='admin';
		if(!$id)
			$this->Session->setFlash($this->notfoundmessage);
		else{
		
			$this->User->id=$id;
			if($this->User->exists()){
			
					$this->set('title_for_layout',$this->Session->read('Auth.User.username'));
				if($this->request->is('Post') || $this->request->is('Put')){
					
				if($this->Session->read('Auth.User.id')=='1'){
					if($this->User->save($this->request->data)){
						$this->Session->setFlash($this->editmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
					}
					else
						$this->Session->setFlash($this->errormessage);
					}
					else if($this->Session->read('Auth.User.role')== 'admin'){
							$test=$this->User->findById($this->request->data['User']['id']);
							if($test['User']['role']!='admin'){
								if($this->User->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Utilisateurs";
				$this->request->data['Evennement']['logicielar']="المستخدمين";
				$this->request->data['Evennement']['logicielen']="Users";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
			
								$this->Session->setFlash($this->editmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
								}
								else
									$this->Session->setFlash($this->errormessage);
							}
							else if($test['User']['role']=='admin' && $this->Session->read('Auth.User.id')== $this->request->data['User']['id']){
										if($this->User->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Utilisateurs";
				$this->request->data['Evennement']['logicielar']="المستخدمين";
				$this->request->data['Evennement']['logicielen']="Users";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
			
										$this->Session->setFlash($this->editmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
										}
										else
											$this->Session->setFlash($this->errormessage);
									}
							else
								$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
						
					}
					else{
							if($this->Session->read('Auth.User.id')== $this->request->data['User']['id']){
									if($this->User->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Utilisateurs";
				$this->request->data['Evennement']['logicielar']="المستخدمين";
				$this->request->data['Evennement']['logicielen']="Users";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
			
									$this->Session->setFlash($this->editmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
									}
									else
										$this->Session->setFlash($this->errormessage);
								}
								else
									$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
					}
				}
				else{
				if($this->Session->read('Auth.User.role')!= 'admin' && $this->Session->read('Auth.User.id')!=$id){
					$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
					$this->redirect(array('action'=>'profile'));
				}else{
					$this->request->data=$this->User->read(null,$id);
					unset($this->request->data['User']['password']);
					if($this->request->data['User']['role']=='client')
						$this->Session->write('lerole','client');
					else
						$this->Session->write('lerole','no');
					}
				}
			}
			else
				throw new NotFoundException($this->notfoundmessage);
				
		}
	}
	public function passe($id=null){
	$this->Session->write('type','accueil');
	
			$this->set('current_icon','icons/group.png');
			$this->set('current_controller','users/admin');
			$this->set('current_controllername','Utilisateurs');
			$this->set('current_iconview','icons/user_add.png');
			$this->set('current_view','users/add');
			$this->set('current_iconviewname','Modification du profile d\'utilisateur');
			
	$this->layout='admin';
		if(!$id)
			$this->Session->setFlash($this->notfoundmessage);
		else{
		
			$this->User->id=$id;
			if($this->User->exists()){
			
					$this->set('title_for_layout',$this->Session->read('Auth.User.username'));
				if($this->request->is('Post') || $this->request->is('Put')){
					
				if($this->Session->read('Auth.User.id')=='1'){
					if($this->User->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier mot de passe";
				$this->request->data['Evennement']['titrear']="تعديل الكلمة السرية";
				$this->request->data['Evennement']['titreen']="Edit password";
				$this->request->data['Evennement']['logiciel']="Utilisateurs";
				$this->request->data['Evennement']['logicielar']="المستخدمين";
				$this->request->data['Evennement']['logicielen']="Users";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
			
						$this->Session->setFlash($this->editmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
					}
					else
						$this->Session->setFlash($this->errormessage);
					}
					else if($this->Session->read('Auth.User.role')== 'admin'){
							$test=$this->User->findById($this->request->data['User']['id']);
							if($test['User']['role']!='admin'){
								if($this->User->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier mot de passe";
				$this->request->data['Evennement']['titrear']="تعديل الكلمة السرية";
				$this->request->data['Evennement']['titreen']="Edit password";
				$this->request->data['Evennement']['logiciel']="Utilisateurs";
				$this->request->data['Evennement']['logicielar']="المستخدمين";
				$this->request->data['Evennement']['logicielen']="Users";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
			
								$this->Session->setFlash($this->editmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
								}
								else
									$this->Session->setFlash($this->errormessage);
							}
							else if($test['User']['role']=='admin' && $this->Session->read('Auth.User.id')== $this->request->data['User']['id']){
										if($this->User->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier mot de passe";
				$this->request->data['Evennement']['titrear']="تعديل الكلمة السرية";
				$this->request->data['Evennement']['titreen']="Edit password";
				$this->request->data['Evennement']['logiciel']="Utilisateurs";
				$this->request->data['Evennement']['logicielar']="المستخدمين";
				$this->request->data['Evennement']['logicielen']="Users";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
			
										$this->Session->setFlash($this->editmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
										}
										else
											$this->Session->setFlash($this->errormessage);
									}
							else
								$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
						
					}
					else{
							if($this->Session->read('Auth.User.id')== $this->request->data['User']['id']){
									if($this->User->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier mot de passe";
				$this->request->data['Evennement']['titrear']="تعديل الكلمة السرية";
				$this->request->data['Evennement']['titreen']="Edit password";
				$this->request->data['Evennement']['logiciel']="Utilisateurs";
				$this->request->data['Evennement']['logicielar']="المستخدمين";
				$this->request->data['Evennement']['logicielen']="Users";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
			
									$this->Session->setFlash($this->editmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
									}
									else
										$this->Session->setFlash($this->errormessage);
								}
								else
									$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
					}
				}
				else{
					
				if($this->Session->read('Auth.User.role')!= 'admin' && $this->Session->read('Auth.User.id')!=$id){
					$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
					$this->redirect(array('action'=>'profile'));
				}else{
					$this->request->data=$this->User->read(null,$id);
					unset($this->request->data['User']['password']);
					}

				}
			}
			else
				throw new NotFoundException($this->notfoundmessage);
		}
	}
	public function delete($id=null){
		if($id){
			$this->request->onlyAllow('Post');
			$this->User->id=$id;
			if($this->User->exists()){
				if($this->Session->read('Auth.User.id')=='1'){
					if($id==1){
						$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
						$this->redirect(array('action'=>'admin'));
					}
					else{
					if($this->User->delete()){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Utilisateurs";
				$this->request->data['Evennement']['logicielar']="المستخدمين";
				$this->request->data['Evennement']['logicielen']="Users";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
			
							$this->Session->setFlash($this->delmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
							$this->redirect(array('action'=>'admin'));
						}
						else
							$this->Session->setFlash($this->errormessage);
					}
				}
				/*else if($this->Session->read('Auth.User.id')==$this->User->id){
					$this->Session->setFlash('good aba nasser ;)'));
					return $this->redirect(array('action'=>'admin'));
				}*/
				else{
					$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
					return $this->redirect(array('action'=>'admin'));
				}
			}
			else
				throw new NotFoundException($this->notfoundmessage);
		}
		else
			$this->Session->setFlash($this->notfoundmessage);
	}
	public function activation($username=null,$cle=null){
		if(!$username){
			$this->Session->setFlash($this->notfoundmessage);
		}
		else if(!$cle){
			$this->Session->setFlash($this->notfoundmessage);
		}
		else{
		$this->set('title_for_layout',"Activation de compte d'utilisateur");
			$usertest=$this->User->find('first',array('conditions'=>array('User.username'=>$username)));
			if(!$usertest)
				$this->Session->setFlash($this->notfoundmessage);
			else{
			//echo $usertest['User']['cle']." hhh ".$cle;
			if($usertest['User']['cle']==$cle){
				if($usertest['User']['etat']==1)
					$this->Session->setFlash($this->okmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
				else{
					$this->User->id=$usertest['User']['id'];
					$this->User->saveField('etat','1');
					$this->Session->setFlash($this->okmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
					$this->redirect(array('action'=>'login'));
					}
				}
				else{
					$this->Session->setFlash($this->notfoundmessage);
				}
			}
		}
	}
	public function login($iduser=null){
	$letest=0;
	if($iduser){
	$user=$this->User->findById($iduser);
	if($user['User']['etat']==0){
	
					$this->User->id=$iduser;
					$cle=md5(md5(date("Y/m/d").time()));
					$this->User->saveField('cle',$cle);
					
					$letest=1;
					$this->set('letest',$letest);
					$this->set('nom',$user['User']['nom']);
					$this->set('email',$user['User']['email']);
					$this->set('username',$user['User']['username']);
					$this->set('cle',$cle);
					//$this->Session->setFlash('gagas:'.$user['User']['nom'].$user['User']['email'].$user['User']['username']));
		}
	}
		if($this->Auth->user()){
			$this->redirect(array('action'=>'profile'));
			}
		$this->set('title_for_layout','Se connecter');
		if($this->request->is('Post')){
		if(!empty($this->request->data['User']['username'])){
			if($this->Auth->login()){
				$usertest=$this->User->findById($this->Session->read('Auth.User.id'));
				if($usertest['User']['etat']==0){
					$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
					//$this->Session->setFlash('Votre compte n\'est pas encore actif.<br> Merci de Vérifier votre email pour le message d\'activation'));
					
					$id=$this->Session->read('Auth.User.id');
					$users=$this->User->findById($id);
					$this->User->id=$id;
					$old=$users['User']['last'];
					$old=substr($old, -500);
					$ip="_";
					$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
					$last=$users['User']['username']." /innactive/ ".date("Y/m/d")."  ".time()."  ".$ip." <br>old: ".$old;
					$last=substr($last, 0, 450);
					$this->User->saveField('last',$last);
					
					$this->Auth->logout();
				}
				else{
				//$this->Session->create('finder','finder');
				$id=$this->Session->read('Auth.User.id');
				
				$users=$this->User->findById($id);
				$this->User->id=$id;
				$old=$users['User']['last'];
				$old=substr($old, -500);
				$ip="_";
				$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
				$last=$users['User']['username']."  ".date("Y/m/d")."  ".time()."  ".$ip." <br>old: ".$old;
				$last=substr($last, 0, 450);
				$this->User->saveField('last',$last);
				if($users['User']['role']=="client")
					return $this->redirect(array('action'=>'profile'));
				else
					return $this->redirect($this->Auth->redirect());
				}
			}
			else{
				/*$this->request->data['Eruser']['eruser']=$this->request->data['User']['username'];
				$this->request->data['Eruser']['erpass']=$this->request->data['User']['password'];
				$this->Eruser->create();
				$this->Eruser->save($this->request->data);
				*/
				$this->Session->setFlash($this->errormessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
				
				}
				}
		}
	}
	public function logout(){
	if($this->Auth->logout()){
				$this->Session->write('type','accueil');
				return $this->redirect($this->Auth->redirect());
			}
		
	}
	public function recherche(){
	
			$this->set('current_icon','icons/group.png');
			$this->set('current_controller','users/admin');
			$this->set('current_controllername','Utilisateurs');
			$this->set('current_iconview','icons/rechercher.png');
			$this->set('current_view','users/recherche');
			$this->set('current_iconviewname','Recherche');
			
	$this->Session->write('type','accueil');
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$employe;
			$cle=$this->request->data['User']['nom1'];
			if($_POST['rechercher'] == '1')
				$employe=$this->User->find('all',array('conditions'=>array('OR' => array('User.nom LIKE' => "%$cle%"))));
				//$employe=$this->User->find('all',array('conditions'=>array('User.nom="'.$this->request->data['User']['nom1'].'"')));
			else if($_POST['rechercher'] == '2')
				$employe=$this->User->find('all',array('conditions'=>array('User.email="'.$this->request->data['User']['nom2'].'"')));
			else if($_POST['rechercher'] == '4')
				$employe=$this->User->find('all',array('conditions'=>array('User.role="'.$this->request->data['User']['specialite'].'"')));
			else if($_POST['rechercher'] == '5')
				$employe=$this->User->find('all',array('conditions'=>array('User.id='.$this->request->data['User']['ide'])));
			$this->set(compact('employe', 'test'));
		}
		if($test==0)
			$this->set(compact('test'));
	}
	
	public function site(){
		$this->Session->write('type','site');
		return $this->redirect(array('controller'=>'demandes','action'=>'admin'));
	}
	public function entreprise(){
		$this->Session->write('type','entreprise');
		return $this->redirect(array('controller'=>'employes','action'=>'admin'));
	}
	public function fr(){
		$this->Session->write('lang','fr');
		return $this->redirect(array('action'=>'accueil'));
	}
	public function en(){
		$this->Session->write('lang','en');
		return $this->redirect(array('action'=>'accueil'));
	}
	public function ar(){
		$this->Session->write('lang','ar');
		return $this->redirect(array('action'=>'accueil'));
	}
	public function accueil($pdf=null){
	$this->Session->write('type','accueil');
	$this->set('title_for_layout',"Tableau de bord");
	
	$this->layout='admin';
		
        $optionsmat = $this->Materiel->find('list', array('fields'=> array('Materiel.id', 'Materiel.nom', 'Materiel.ref'),'order'=>array('Materiel.nom'=>'asc')));
	$optionsrec = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'order'=>array('Client.nom'=>'asc'),'conditions'=>array('type'=>'client'),'order'=>array('Client.nom'=>'asc')));
	$optionsfr = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'order'=>array('Client.nom'=>'asc'),'conditions'=>array('type'=>'fournisseur'),'order'=>array('Client.nom'=>'asc')));
	$this->set(compact('optionsmat','optionsrec','optionsfr'));
	
	
		$hygiene=$this->Materiel->find('count',array('conditions'=>array('typemateriel'=>"Produits d'hygiène",'qte >'=>0)));
		$fbureau=$this->Materiel->find('count',array('conditions'=>array('typemateriel'=>"Fourniture de bureau",'qte >'=>0)));
		$finformatique=$this->Materiel->find('count',array('conditions'=>array('typemateriel'=>"Fourniture informatique",'qte >'=>0)));
		$exploitation=$this->Materiel->find('count',array('conditions'=>array('typemateriel'=>"Matériel d'exploitation",'qte >'=>0)));
		$medicoTechnique=$this->Materiel->find('count',array('conditions'=>array('typemateriel'=>"Matériel medicoTechnique",'qte >'=>0)));
		$medicoHospitalier=$this->Materiel->find('count',array('conditions'=>array('typemateriel'=>"Matériel medicoHospitalier",'qte >'=>0)));
		$informatique=$this->Materiel->find('count',array('conditions'=>array('typemateriel'=>"Matériel informatique",'qte >'=>0)));
		$bureau=$this->Materiel->find('count',array('conditions'=>array('typemateriel'=>"Matériel mobilier de bureau",'qte >'=>0)));
		
		$entree=$this->Stockaction->find('count',array('conditions'=>array('nom'=>'entrée')));
		$sortie=$this->Stockaction->find('count',array('conditions'=>array('nom'=>'sortie')));
		$entrees=$this->Stockaction->find('all',array('conditions'=>array('nom'=>'entrée'),'order'=>array('date'=>'asc')));
		$sorties=$this->Stockaction->find('all',array('conditions'=>array('nom'=>'sortie'),'order'=>array('date'=>'asc')));
		
		$inventairecount=$this->Inventaire->find('count');
		$inventairedesgcount=$this->Stockcategorie->find('count', array('conditions'=>array('type="inventaire"')));
		$inventairedeplcount=$this->Inventaire->find('count',array('group' => array('Inventaire.piece_nom HAVING COUNT(*) > 1')));
		
		$this->set(compact('hygiene','fbureau','finformatique','exploitation','medicoTechnique','medicoHospitalier','informatique','bureau','entree','sortie','entrees','sorties','inventairecount','inventairedesgcount','inventairedeplcount'));
		if($pdf=="pdf"){
						$name=$this->request->params['controller']."_".md5(time());
						$this->layout = 'imprimerpdf';
						$this->Mpdf->init();
						$this->Mpdf->setFilename($name.'.pdf');
						$this->Mpdf->setOutput('D');
						$this->Mpdf->SetWatermarkText("Draft");
				}
	}
	
}
?>
