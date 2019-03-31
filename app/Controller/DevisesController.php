<?php
App::uses('AppController', 'Controller');

class DevisesController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Devise','Client','Item','Materiel','Produit','Service','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Devise.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Devise.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Devises']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Devise->isOwnedBy($postId,$user['id']))
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
	if($this->Session->read('typedevis')=='s'){
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','devises/t');
			$this->set('current_controllername','Gestion commerciale: Devis');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','devises/s');
			$this->set('current_iconviewname','Sans réponse - en attente');
			$this->set('title_for_layout',"Sans réponse - en attente");
		$post=$this->Paginator->paginate('Devise',array('etat'=>'Sans réponse - en attente'));
		}
	else if($this->Session->read('typedevis')=='a'){
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','devises/t');
			$this->set('current_controllername','Gestion commerciale: Devis');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','devises/a');
			$this->set('current_iconviewname','Accepté');
			$this->set('title_for_layout',"Accepté");
		$post=$this->Paginator->paginate('Devise',array('etat'=>'Accepté'));
		}
	else if($this->Session->read('typedevis')=='r'){
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','devises/t');
			$this->set('current_controllername','Gestion commerciale: Devis');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','devises/r');
			$this->set('current_iconviewname','Refusé');
			$this->set('title_for_layout',"Refusé");
		$post=$this->Paginator->paginate('Devise',array('etat'=>'Refusé'));
		}
	else{
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','devises/t');
			$this->set('current_controllername','Gestion commerciale: Devis');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','devises/t');
			$this->set('current_iconviewname','Administration');
			$this->set('title_for_layout',"Administration");
		$post=$this->Paginator->paginate('Devise');
		}
		$this->set(compact('post'));
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/admin');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/admin');
		}

	}
	
	public function view($id=null,$titre=null){
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','devises/t');
			$this->set('current_controllername','Gestion commerciale: Devis');
			$this->set('current_iconview','icons/afficher.png');
			$this->set('current_view','devises/view/'.$id."/".$titre);
			$this->set('current_iconviewname','Devis: '.$titre);
			$this->set('title_for_layout',"Devis: ".$titre);
	$this->layout = 'admin';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		if(!$titre){
		$this->redirect(array('action'=>'../'));
		}
		$post=$this->Devise->findById($id);
		if($post){
		$titredetest=$post['Devise']['nom'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Devise->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Devise->findById($id);
			$client=$this->Client->findById($post['Devise']['client_id']);
			$type=$post['Devise']['type'];
			$ref=$post['Devise']['reference'];
			$items=$this->Item->find('all',array('conditions'=>array('type'=>'devis','typex'=>$type,'ref'=>$ref)));
			$this->set(compact('client','items'));
			if($post){
				$this->set('title_for_layout',$post['Devise']['nom']);
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
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','devises/t');
			$this->set('current_controllername','Gestion commerciale: Devis');
			$this->set('current_iconview','icons/ajouter.png');
			$this->set('current_view','devises/add');
			$this->set('current_iconviewname','Ajouter un Devis');
			$this->set('title_for_layout',"Ajouter un Devis");
	$this->layout = 'admin';
	$options = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('Client.type = "client"')));
	$stock = $this->Materiel->find('list', array('fields'=> array('Materiel.id', 'Materiel.nom')));
	$produit = $this->Produit->find('list', array('fields'=> array('Produit.id', 'Produit.titre')));
	$service = $this->Service->find('list', array('fields'=> array('Service.id', 'Service.titre')));
	$this->set(compact('options','stock','produit','service'));
		if($this->request->is('Post'))
		{
			$this->Devise->create();
			$employe=$this->Client->findById($this->request->data['Devise']['client_id']);
			$this->request->data['Devise']['client_nom'] = $employe['Client']['nom'];
			
			if($this->request->data['Devise']['typedevis']=="Standard"){
				if($this->request->data['Devise']['typearticle']=="Article du stock"){
					$item=$this->Materiel->findById($this->request->data['Devise']['typea']);
					$this->Item->create();
					$this->request->data['Item']['type']="devis";
					$this->request->data['Item']['ref']=$this->request->data['Devise']['reference'];
					$this->request->data['Item']['typex']=$this->request->data['Devise']['type'];
					$this->request->data['Item']['refitem']=$item['Materiel']['ref'];
					$this->request->data['Item']['typeitem']=$this->request->data['Devise']['typearticle'];
					$this->request->data['Item']['qte']=$this->request->data['Devise']['qte'];
					$this->request->data['Item']['desc']=$item['Materiel']['nom'];
					if($this->request->data['Devise']['type']=="A envoyer"){
						$this->request->data['Item']['prix']=$item['Materiel']['prix'];
						$this->request->data['Devise']['montant']=$item['Materiel']['prix']*$this->request->data['Devise']['qte'];
					}else{
						$this->request->data['Item']['prix']=$item['Materiel']['prixv'];
						$this->request->data['Devise']['montant']=$item['Materiel']['prixv']*$this->request->data['Devise']['qte'];
					}
					$this->Item->save($this->request->data);
				}
				else if($this->request->data['Devise']['typearticle']=="Produit du site"){
					$item=$this->Produit->findById($this->request->data['Devise']['typep']);
					$this->Item->create();
					$this->request->data['Item']['type']="devis";
					$this->request->data['Item']['ref']=$this->request->data['Devise']['reference'];
					$this->request->data['Item']['typex']=$this->request->data['Devise']['type'];
					$this->request->data['Item']['refitem']=$item['Produit']['ref'];
					$this->request->data['Item']['typeitem']=$this->request->data['Devise']['typearticle'];
					$this->request->data['Item']['qte']=$this->request->data['Devise']['qte'];
					$this->request->data['Item']['desc']=$item['Produit']['titre'];
						$this->request->data['Item']['prix']=$item['Produit']['prix'];
						$this->request->data['Devise']['montant']=$item['Produit']['prix']*$this->request->data['Devise']['qte'];
					$this->Item->save($this->request->data);
				}
				else{
					$item=$this->Service->findById($this->request->data['Devise']['types']);
					$this->Item->create();
					$this->request->data['Item']['type']="devis";
					$this->request->data['Item']['ref']=$this->request->data['Devise']['reference'];
					$this->request->data['Item']['typex']=$this->request->data['Devise']['type'];
					$this->request->data['Item']['refitem']=$item['Service']['ref'];
					$this->request->data['Item']['typeitem']=$this->request->data['Devise']['typearticle'];
					$this->request->data['Item']['qte']=$this->request->data['Devise']['qte'];
					$this->request->data['Item']['desc']=$item['Service']['titre'];
						$this->request->data['Item']['prix']=$item['Service']['prix'];
						$this->request->data['Devise']['montant']=$item['Service']['prix']*$this->request->data['Devise']['qte'];
					$this->Item->save($this->request->data);
				}
			}
			$this->request->data['Devise']['user_id'] = $this->Auth->User('id');
			if($this->Devise->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Devis";
				$this->request->data['Evennement']['logicielar']="مقايسات";
				$this->request->data['Evennement']['logicielen']="Quotation";
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
		if($this->Devise->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Devis";
				$this->request->data['Evennement']['logicielar']="مقايسات";
				$this->request->data['Evennement']['logicielen']="Quotation";
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
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','devises/t');
			$this->set('current_controllername','Gestion commerciale: Devis');
			$this->set('current_iconview','icons/modifier.png');
			$this->set('current_view','devises/modifier/'.$id);
			$this->set('current_iconviewname','Modification d\'un devis');
			$this->set('title_for_layout',"Modification d'un devis");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Devise->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide Devis'));
		$this->Devise->id=$id;
		$options = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('Client.type = "client"')));
		$stock = $this->Materiel->find('list', array('fields'=> array('Materiel.id', 'Materiel.nom')));
		$produit = $this->Produit->find('list', array('fields'=> array('Produit.id', 'Produit.titre')));
		$service = $this->Service->find('list', array('fields'=> array('Service.id', 'Service.titre')));
		$this->set(compact('options','stock','produit','service'));
		
		if(!$this->request->data)
			$this->request->data=$post;
		else{
			$employe=$this->Client->findById($this->request->data['Devise']['client_id']);
			$this->request->data['Devise']['client_nom'] = $employe['Client']['nom'];
			
			if($this->request->data['Devise']['typedevis']=="Standard"){
				if($this->request->data['Devise']['delete']){
					$type=$this->request->data['Devise']['type'];
					$ref=$this->request->data['Devise']['reference'];
					$post=0;
					$this->Item->deleteAll(array('type'=>'devis','typex'=>$type,'ref'=>$ref),false);
					}
					
				if($this->request->data['Devise']['typearticle']=="Article du stock"){
					$item=$this->Materiel->findById($this->request->data['Devise']['typea']);
					$this->Item->create();
					$this->request->data['Item']['type']="devis";
					$this->request->data['Item']['ref']=$this->request->data['Devise']['reference'];
					$this->request->data['Item']['typex']=$this->request->data['Devise']['type'];
					$this->request->data['Item']['refitem']=$item['Materiel']['ref'];
					$this->request->data['Item']['typeitem']=$this->request->data['Devise']['typearticle'];
					$this->request->data['Item']['qte']=$this->request->data['Devise']['qte'];
					$this->request->data['Item']['desc']=$item['Materiel']['nom'];
					if($this->request->data['Devise']['type']=="A envoyer"){
						$this->request->data['Item']['prix']=$item['Materiel']['prix'];
						$this->request->data['Devise']['montant']=$post['Devise']['montant']+($item['Materiel']['prix']*$this->request->data['Devise']['qte']);
					}else{
						$this->request->data['Item']['prix']=$item['Materiel']['prixv'];
						$this->request->data['Devise']['montant']=$post['Devise']['montant']+($item['Materiel']['prixv']*$this->request->data['Devise']['qte']);
					}
					$this->Item->save($this->request->data);
				}
				else if($this->request->data['Devise']['typearticle']=="Produit du site"){
					$item=$this->Produit->findById($this->request->data['Devise']['typep']);
					$this->Item->create();
					$this->request->data['Item']['type']="devis";
					$this->request->data['Item']['ref']=$this->request->data['Devise']['reference'];
					$this->request->data['Item']['typex']=$this->request->data['Devise']['type'];
					$this->request->data['Item']['refitem']=$item['Produit']['ref'];
					$this->request->data['Item']['typeitem']=$this->request->data['Devise']['typearticle'];
					$this->request->data['Item']['qte']=$this->request->data['Devise']['qte'];
					$this->request->data['Item']['desc']=$item['Produit']['titre'];
						$this->request->data['Item']['prix']=$item['Produit']['prix'];
						$this->request->data['Devise']['montant']=$post['Devise']['montant']+($item['Produit']['prix']*$this->request->data['Devise']['qte']);
					$this->Item->save($this->request->data);
				}
				else{
					$item=$this->Service->findById($this->request->data['Devise']['types']);
					$this->Item->create();
					$this->request->data['Item']['type']="devis";
					$this->request->data['Item']['ref']=$this->request->data['Devise']['reference'];
					$this->request->data['Item']['typex']=$this->request->data['Devise']['type'];
					$this->request->data['Item']['refitem']=$item['Service']['ref'];
					$this->request->data['Item']['typeitem']=$this->request->data['Devise']['typearticle'];
					$this->request->data['Item']['qte']=$this->request->data['Devise']['qte'];
					$this->request->data['Item']['desc']=$item['Service']['titre'];
						$this->request->data['Item']['prix']=$item['Service']['prix'];
						$this->request->data['Devise']['montant']=$post['Devise']['montant']+($item['Service']['prix']*$this->request->data['Devise']['qte']);
					$this->Item->save($this->request->data);
				}
			}
			if($this->Devise->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Midifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Devis";
				$this->request->data['Evennement']['logicielar']="مقايسات";
				$this->request->data['Evennement']['logicielen']="Quotation";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
				$this->Session->setFlash($this->editmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
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
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','devises/t');
			$this->set('current_controllername','Gestion commerciale: Devis');
			$this->set('current_iconview','icons/rechercher.png');
			$this->set('current_view','devises/recherche');
			$this->set('current_iconviewname','Recherche de devis');
			$this->set('title_for_layout',"Recherche de devis");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '2')
				$realisation=$this->Devise->find('all',array('conditions'=>array('Devise.montant='.$this->request->data['Devise']['mont'])));
			else if($_POST['rechercher'] == '1'){
				$cle=$this->request->data['Devise']['nom1'];
				$realisation=$this->Devise->find('all',array('conditions'=>array('OR' => array('Devise.nom LIKE' => "%$cle%"))));
				}
			else if($_POST['rechercher'] == '4'){
				$realisation=$this->Devise->find('all',array('conditions'=>array('Devise.etat="'.$this->request->data['Devise']['et'].'"')));
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
		$post=$this->Devise->findById($id);
		if($post){
			//$post=$this->Devise->findById($id);
			$client=$this->Client->findById($post['Devise']['client_id']);
			$type=$post['Devise']['type'];
			$ref=$post['Devise']['reference'];
			$items=$this->Item->find('all',array('conditions'=>array('type'=>'devis','typex'=>$type,'ref'=>$ref)));
			$this->set(compact('client','items'));
			if($post){
				$this->set('title_for_layout',"Devis");
				$this->set('post',$post);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Devis";
				$this->request->data['Evennement']['logicielar']="مقايسات";
				$this->request->data['Evennement']['logicielen']="Quotation";
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
				throw new NotFoundException(_('invalide devis!'));
		}else{
			throw new NotFoundException(_('invalide devis!'));
			}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/imprimer');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/imprimer');
		}

	}
	public function imprimervide($id=null){
	if($this->Session->read('Auth.User.imprimer')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->layout = 'imprimeride';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		$post=$this->Devise->findById($id);
		if($post){
			$post=$this->Devise->findById($id);
			$client=$this->Client->findById($post['Devise']['client_id']);
			$this->set('client',$client);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer list";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Devis";
				$this->request->data['Evennement']['logicielar']="مقايسات";
				$this->request->data['Evennement']['logicielen']="Quotation";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
			if($post){
				$this->set('title_for_layout',"Devis");
				$this->set('post',$post);
				}
				else
				throw new NotFoundException(_('invalide devis!'));
		}else{
			throw new NotFoundException(_('invalide devis!'));
			}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/imprimervide');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/imprimervide');
		}

	}
	public function imprimerliste($pdf=null){
	if($this->Session->read('Auth.User.imprimerliste')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->set('title_for_layout',"Liste de devis");
	$this->layout = 'imprimer';
	if($this->Session->read('typedevis')=='s')
		$post=$this->Devise->find('all',array('conditions'=>array('etat'=>'Sans réponse - en attente')));
	else if($this->Session->read('typedevis')=='a')
		$post=$this->Devise->find('all',array('conditions'=>array('etat'=>'Accepté')));
	else if($this->Session->read('typedevis')=='r')
		$post=$this->Devise->find('all',array('conditions'=>array('etat'=>'Refusé')));
	else
		$post=$this->Devise->find('all');
		$this->set(compact('post'));
				
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer list";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Devis";
				$this->request->data['Evennement']['logicielar']="مقايسات";
				$this->request->data['Evennement']['logicielen']="Quotation";
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
	public function s($id=null){
		$this->Session->write('typedevis','s');
		$this->redirect(array('action'=>'admin'));
	}
	public function a($id=null){
		$this->Session->write('typedevis','a');
		$this->redirect(array('action'=>'admin'));
	}
	public function r($id=null){
		$this->Session->write('typedevis','r');
		$this->redirect(array('action'=>'admin'));
	}
	public function t($id=null){
		$this->Session->write('typedevis','t');
		$this->redirect(array('action'=>'admin'));
	}
} // fin de "appcontroller"
?>