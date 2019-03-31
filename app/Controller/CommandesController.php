<?php
App::uses('AppController', 'Controller');

class CommandesController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Commande','Client','Item','Materiel','Produit','Service','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Commande.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Commande.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Commandes']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Commande->isOwnedBy($postId,$user['id']))
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
	if($this->Session->read('typecommande')=='ae'){
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','commandes/tout');
			$this->set('current_controllername','Gestion commerciale: Commandes');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','commandes/ae');
			$this->set('current_iconviewname','A envoyer');
			$this->set('title_for_layout',"A envoyer");
		$post=$this->Paginator->paginate('Commande',array('type'=>'A envoyer'));
		}
	else if($this->Session->read('typecommande')=='ar'){
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','commandes/tout');
			$this->set('current_controllername','Gestion commerciale: Commandes');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','commandes/ar');
			$this->set('current_iconviewname','Arrivage de commandes');
			$this->set('title_for_layout',"Arrivage de commandes");
		$post=$this->Paginator->paginate('Commande',array('type'=>'Arrivage'));
		}
	else{
		$post=$this->Paginator->paginate('Commande');
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','commandes/tout');
			$this->set('current_controllername','Gestion commerciale: Commandes');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','commandes/admin');
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
	
	public function view($id=null,$titre=null){
	$this->layout = 'admin';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		if(!$titre){
		$this->redirect(array('action'=>'../'));
		}
		$post=$this->Commande->findById($id);
		if($post){
		$titredetest=$post['Commande']['nom'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Commande->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Commande->findById($id);
			$client=$this->Client->findById($post['Commande']['client_id']);
			$type=$post['Commande']['type'];
			$ref=$post['Commande']['reference'];
			$items=$this->Item->find('all',array('conditions'=>array('type'=>'commande','typex'=>$type,'ref'=>$ref)));
			$this->set(compact('client','items'));
			if($post){
				$this->set('current_icon','icons/basket.png');
				$this->set('current_controller','commandes/tout');
				$this->set('current_controllername','Gestion commerciale: Commandes');
				$this->set('current_iconview','icons/afficher.png');
				$this->set('current_view','commandes/view/'.$id."/".$titre);
				$this->set('current_iconviewname',$titre);
				$this->set('title_for_layout',$titre);
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
				$this->set('current_controller','commandes/tout');
				$this->set('current_controllername','Gestion commerciale: Commandes');
				$this->set('current_iconview','icons/ajouter.png');
				$this->set('current_view','commandes/add');
				$this->set('current_iconviewname',"Ajouter une commande");
				$this->set('title_for_layout',"Ajouter une commande");
	$this->layout = 'admin';
	$options = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('Client.type = "client"')));
	$optionsf = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('Client.type <> "client"')));
	$stock = $this->Materiel->find('list', array('fields'=> array('Materiel.id', 'Materiel.nom')));
	$produit = $this->Produit->find('list', array('fields'=> array('Produit.id', 'Produit.titre')));
	$service = $this->Service->find('list', array('fields'=> array('Service.id', 'Service.titre')));
	$this->set(compact('options','optionsf','stock','produit','service'));
		if($this->request->is('Post'))
		{
			$this->Commande->create();
			
			if($this->request->data['Commande']['type']=="A envoyer"){
				$employe=$this->Client->findById($this->request->data['Commande']['client_idf']);
				$this->request->data['Commande']['client_id'] = $employe['Client']['id'];
				$this->request->data['Commande']['client_nom'] = $employe['Client']['nom'];
			}else{
				$employe=$this->Client->findById($this->request->data['Commande']['client_ids']);
				$this->request->data['Commande']['client_id'] = $employe['Client']['id'];
				$this->request->data['Commande']['client_nom'] = $employe['Client']['nom'];
			}
			
			if($this->request->data['Commande']['typearticle']=="Article du stock"){
				$item=$this->Materiel->findById($this->request->data['Commande']['typea']);
				$this->Item->create();
				$this->request->data['Item']['type']="commande";
				$this->request->data['Item']['ref']=$this->request->data['Commande']['reference'];
				$this->request->data['Item']['typex']=$this->request->data['Commande']['type'];
				$this->request->data['Item']['refitem']=$item['Materiel']['ref'];
				$this->request->data['Item']['typeitem']=$this->request->data['Commande']['typearticle'];
				$this->request->data['Item']['qte']=$this->request->data['Commande']['qte'];
				$this->request->data['Item']['desc']=$item['Materiel']['nom'];
				if($this->request->data['Commande']['type']=="A envoyer"){
					$this->request->data['Item']['prix']=$item['Materiel']['prix'];
					$this->request->data['Commande']['montant']=$item['Materiel']['prix']*$this->request->data['Commande']['qte'];
				}else{
					$this->request->data['Item']['prix']=$item['Materiel']['prixv'];
					$this->request->data['Commande']['montant']=$item['Materiel']['prixv']*$this->request->data['Commande']['qte'];
				}
				$this->Item->save($this->request->data);
			}
			else if($this->request->data['Commande']['typearticle']=="Produit du site"){
				$item=$this->Produit->findById($this->request->data['Commande']['typep']);
				$this->Item->create();
				$this->request->data['Item']['type']="commande";
				$this->request->data['Item']['ref']=$this->request->data['Commande']['reference'];
				$this->request->data['Item']['typex']=$this->request->data['Commande']['type'];
				$this->request->data['Item']['refitem']=$item['Produit']['ref'];
				$this->request->data['Item']['typeitem']=$this->request->data['Commande']['typearticle'];
				$this->request->data['Item']['qte']=$this->request->data['Commande']['qte'];
				$this->request->data['Item']['desc']=$item['Produit']['titre'];
					$this->request->data['Item']['prix']=$item['Produit']['prix'];
					$this->request->data['Commande']['montant']=$item['Produit']['prix']*$this->request->data['Commande']['qte'];
				$this->Item->save($this->request->data);
			}
			else{
				$item=$this->Service->findById($this->request->data['Commande']['types']);
				$this->Item->create();
				$this->request->data['Item']['type']="commande";
				$this->request->data['Item']['ref']=$this->request->data['Commande']['reference'];
				$this->request->data['Item']['typex']=$this->request->data['Commande']['type'];
				$this->request->data['Item']['refitem']=$item['Service']['ref'];
				$this->request->data['Item']['typeitem']=$this->request->data['Commande']['typearticle'];
				$this->request->data['Item']['qte']=$this->request->data['Commande']['qte'];
				$this->request->data['Item']['desc']=$item['Service']['titre'];
					$this->request->data['Item']['prix']=$item['Service']['prix'];
					$this->request->data['Commande']['montant']=$item['Service']['prix']*$this->request->data['Commande']['qte'];
				$this->Item->save($this->request->data);
			}
			$this->request->data['Commande']['user_id'] = $this->Auth->User('id');
			if($this->Commande->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter une commande";
				$this->request->data['Evennement']['titrear']="إضافة طلب";
				$this->request->data['Evennement']['titreen']="Add a command";
				$this->request->data['Evennement']['logiciel']="Gestion commerciale";
				$this->request->data['Evennement']['logicielar']="إدارة الأعمال";
				$this->request->data['Evennement']['logicielen']="Business Management";
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
		if($this->Commande->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer une commande";
				$this->request->data['Evennement']['titrear']="إزالة طلب";
				$this->request->data['Evennement']['titreen']="Delete a command";
				$this->request->data['Evennement']['logiciel']="Gestion commerciale";
				$this->request->data['Evennement']['logicielar']="إدارة الأعمال";
				$this->request->data['Evennement']['logicielen']="Business Management";
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
				$this->set('current_controller','commandes/tout');
				$this->set('current_controllername','Gestion commerciale: Commandes');
				$this->set('current_iconview','icons/modifier.png');
				$this->set('current_view','commandes/modifier/'.$id);
				$this->set('current_iconviewname',"Modification d'une commande");
				$this->set('title_for_layout',"Modification d'une commande");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Commande->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide commande'));
		$this->Commande->id=$id;
		$options = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('Client.type = "client"')));
		$optionsf = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('Client.type <> "client"')));
		$stock = $this->Materiel->find('list', array('fields'=> array('Materiel.id', 'Materiel.nom')));
		$produit = $this->Produit->find('list', array('fields'=> array('Produit.id', 'Produit.titre')));
		$service = $this->Service->find('list', array('fields'=> array('Service.id', 'Service.titre')));
		$this->set(compact('options','optionsf','stock','produit','service'));
		
		if(!$this->request->data)
			$this->request->data=$post;
		else{
			
			if($this->request->data['Commande']['type']=="A envoyer"){
				$employe=$this->Client->findById($this->request->data['Commande']['client_idf']);
				$this->request->data['Commande']['client_id'] = $employe['Client']['id'];
				$this->request->data['Commande']['client_nom'] = $employe['Client']['nom'];
			}else{
				$employe=$this->Client->findById($this->request->data['Commande']['client_ids']);
				$this->request->data['Commande']['client_id'] = $employe['Client']['id'];
				$this->request->data['Commande']['client_nom'] = $employe['Client']['nom'];
			}
			
			
			if($this->request->data['Commande']['delete']){
				$type=$this->request->data['Commande']['type'];
				$ref=$this->request->data['Commande']['reference'];
				$post=0;
				$this->Item->deleteAll(array('type'=>'commande','typex'=>$type,'ref'=>$ref),false);
				}
				
			if($this->request->data['Commande']['typearticle']=="Article du stock"){
				$item=$this->Materiel->findById($this->request->data['Commande']['typea']);
				$this->Item->create();
				$this->request->data['Item']['type']="commande";
				$this->request->data['Item']['ref']=$this->request->data['Commande']['reference'];
				$this->request->data['Item']['typex']=$this->request->data['Commande']['type'];
				$this->request->data['Item']['refitem']=$item['Materiel']['ref'];
				$this->request->data['Item']['typeitem']=$this->request->data['Commande']['typearticle'];
				$this->request->data['Item']['qte']=$this->request->data['Commande']['qte'];
				$this->request->data['Item']['desc']=$item['Materiel']['nom'];
				if($this->request->data['Commande']['type']=="A envoyer"){
					$this->request->data['Item']['prix']=$item['Materiel']['prix'];
					$this->request->data['Commande']['montant']=$post['Commande']['montant']+($item['Materiel']['prix']*$this->request->data['Commande']['qte']);
				}else{
					$this->request->data['Item']['prix']=$item['Materiel']['prixv'];
					$this->request->data['Commande']['montant']=$post['Commande']['montant']+($item['Materiel']['prixv']*$this->request->data['Commande']['qte']);
				}
				$this->Item->save($this->request->data);
			}
			else if($this->request->data['Commande']['typearticle']=="Produit du site"){
				$item=$this->Produit->findById($this->request->data['Commande']['typep']);
				$this->Item->create();
				$this->request->data['Item']['type']="commande";
				$this->request->data['Item']['ref']=$this->request->data['Commande']['reference'];
				$this->request->data['Item']['typex']=$this->request->data['Commande']['type'];
				$this->request->data['Item']['refitem']=$item['Produit']['ref'];
				$this->request->data['Item']['typeitem']=$this->request->data['Commande']['typearticle'];
				$this->request->data['Item']['qte']=$this->request->data['Commande']['qte'];
				$this->request->data['Item']['desc']=$item['Produit']['titre'];
					$this->request->data['Item']['prix']=$item['Produit']['prix'];
					$this->request->data['Commande']['montant']=$post['Commande']['montant']+($item['Produit']['prix']*$this->request->data['Commande']['qte']);
				$this->Item->save($this->request->data);
			}
			else{
				$item=$this->Service->findById($this->request->data['Commande']['types']);
				$this->Item->create();
				$this->request->data['Item']['type']="commande";
				$this->request->data['Item']['ref']=$this->request->data['Commande']['reference'];
				$this->request->data['Item']['typex']=$this->request->data['Commande']['type'];
				$this->request->data['Item']['refitem']=$item['Service']['ref'];
				$this->request->data['Item']['typeitem']=$this->request->data['Commande']['typearticle'];
				$this->request->data['Item']['qte']=$this->request->data['Commande']['qte'];
				$this->request->data['Item']['desc']=$item['Service']['titre'];
					$this->request->data['Item']['prix']=$item['Service']['prix'];
					$this->request->data['Commande']['montant']=$post['Commande']['montant']+($item['Service']['prix']*$this->request->data['Commande']['qte']);
				$this->Item->save($this->request->data);
			}
		if($this->Commande->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier une commande";
				$this->request->data['Evennement']['titrear']="تعديل طلب";
				$this->request->data['Evennement']['titreen']="Edit a command";
				$this->request->data['Evennement']['logiciel']="Gestion commerciale";
				$this->request->data['Evennement']['logicielar']="إدارة الأعمال";
				$this->request->data['Evennement']['logicielen']="Business Management";
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
				$this->set('current_controller','commandes/tout');
				$this->set('current_controllername','Gestion commerciale: Commandes');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','commandes/recherche');
				$this->set('current_iconviewname',"Recherche de commandes");
				$this->set('title_for_layout',"Recherche de commandes");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '2')
				$realisation=$this->Commande->find('all',array('conditions'=>array('Commande.montant='.$this->request->data['Commande']['mont'])));
			else if($_POST['rechercher'] == '1'){
				$cle=$this->request->data['Commande']['nom1'];
				$realisation=$this->Commande->find('all',array('conditions'=>array('OR' => array('Commande.nom LIKE' => "%$cle%"))));
				}
			else if($_POST['rechercher'] == '3'){
				$realisation=$this->Commande->find('all',array('conditions'=>array('Commande.reference="'.$this->request->data['Commande']['ref'].'"')));
				}
			else if($_POST['rechercher'] == '4'){
				$realisation=$this->Commande->find('all',array('conditions'=>array('Commande.type="'.$this->request->data['Commande']['et'].'"')));
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
		$post=$this->Commande->findById($id);
		if($post){
			$client=$this->Client->findById($post['Commande']['client_id']);
			$type=$post['Commande']['type'];
			$ref=$post['Commande']['reference'];
			$items=$this->Item->find('all',array('conditions'=>array('type'=>'commande','typex'=>$type,'ref'=>$ref)));
			$this->set(compact('client','items'));
			if($post){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer une commande";
				$this->request->data['Evennement']['titrear']="طباعة طلب";
				$this->request->data['Evennement']['titreen']="Print a command";
				$this->request->data['Evennement']['logiciel']="Gestion commerciale";
				$this->request->data['Evennement']['logicielar']="إدارة الأعمال";
				$this->request->data['Evennement']['logicielen']="Business Management";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
				if($post['Commande']['type']=="A envoyer")
					$this->set('title_for_layout',"DEMANDE DE PRIX");
				else
					$this->set('title_for_layout',"Bon de Commande");
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
				throw new NotFoundException(_('invalide commande!'));
		}else{
			throw new NotFoundException(_('invalide commande!'));
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
	$this->set('title_for_layout',"Bons des commandes");
	$this->layout = 'imprimer';
	if($this->Session->read('typecommande')=='ae')
		$post=$this->Commande->find('all',array('conditions'=>array('type'=>'A envoyer')));
	else if($this->Session->read('typecommande')=='ar')
		$post=$this->Commande->find('all',array('conditions'=>array('type'=>'Arrivage')));
	else
		$post=$this->Commande->find('all');
		$this->set(compact('post'));
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer la liste des commandes";
				$this->request->data['Evennement']['titrear']="طباعة قائمة الطلبات";
				$this->request->data['Evennement']['titreen']="Print list of commands";
				$this->request->data['Evennement']['logiciel']="Gestion commerciale";
				$this->request->data['Evennement']['logicielar']="إدارة الأعمال";
				$this->request->data['Evennement']['logicielen']="Business Management";
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
	public function ae($id=null){
		$this->Session->write('typecommande','ae');
		$this->redirect(array('action'=>'admin'));
	}
	public function ar($id=null){
		$this->Session->write('typecommande','ar');
		$this->redirect(array('action'=>'admin'));
	}
	public function tout($id=null){
		$this->Session->write('typecommande','tout');
		$this->redirect(array('action'=>'admin'));
	}

} // fin de "appcontroller"
?>