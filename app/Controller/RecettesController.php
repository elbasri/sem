<?php
App::uses('AppController', 'Controller');

class RecettesController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Recette','Stockcategorie','Client','Materiel','Produit','Service','Compte','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Recette.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Recette.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Recettes']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Recette->isOwnedBy($postId,$user['id']))
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
	if($this->Session->read('typerecette')=='cat'){
		$data=$this->Session->read('datarecette');
		$post=$this->Paginator->paginate('Recette',array('categorie_id '=>$data));
	$options=$this->Stockcategorie->find('first', array('fields'=> array('Stockcategorie.nom'),'conditions'=>array('id'=>$data)));
				$this->set('current_icon','icons/calculator.png');
				$this->set('current_controller','recettes/tout');
				$this->set('current_controllername','Comptabilité: Recettes');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','categories/'.$data);
				$this->set('current_iconviewname',"Catégorie: ".$options['Stockcategorie']['nom']);
				$this->set('title_for_layout',"Catégorie: ".$options['Stockcategorie']['nom']);
	}
	else{
				$this->set('current_icon','icons/calculator.png');
				$this->set('current_controller','recettes/tout');
				$this->set('current_controllername','Comptabilité: Recettes');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','recettes/tout');
				$this->set('current_iconviewname',"Administration");
				$this->set('title_for_layout',"Administration");
		$post=$this->Paginator->paginate('Recette');
		}
	$this->set(compact('post'));
	
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/admin');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/admin');
		}
	
	
	}
	public function cats(){
				$this->set('current_icon','icons/calculator.png');
				$this->set('current_controller','recettes/tout');
				$this->set('current_controllername','Comptabilité: Recettes');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','recettes/cats');
				$this->set('current_iconviewname',"Catégories");
				$this->set('title_for_layout',"Catégories");
	$this->layout = 'admin';
	$options=$this->Stockcategorie->find('all', array('fields'=> array('Stockcategorie.id', 'Stockcategorie.nom'),'conditions'=>array('type'=>'Recette')));
	$this->set(compact('options'));
	
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/cats');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/cats');
		}
	
	}
	public function imprimerliste($pdf=null){
	if($this->Session->read('Auth.User.imprimerliste')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->set('title_for_layout',"Liste de recettes");
	$this->layout = 'imprimer';
	if($this->Session->read('typerecette')=='cat'){
		$data=$this->Session->read('datarecette');
		$post=$this->Recette->find('all',array('conditions'=>array('categorie_id '=>$data)));
	}
	else
		$post=$this->Recette->find('all');
		$this->set(compact('post'));
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer liste";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Recettes";
				$this->request->data['Evennement']['logicielar']="إيرادات";
				$this->request->data['Evennement']['logicielen']="Receipts";
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
	
	public function categories($id=null){
		$this->Session->write('typerecette','cat');
		if($id){
			$this->Session->write('datarecette',$id);
		}
			$this->redirect(array('action'=>'admin'));
	}
	/*
	public function t($id=null){
		$this->Session->write('typerecette','t');
		$this->redirect(array('action'=>'admin'));
	}
	public function e($id=null){
		$this->Session->write('typerecette','e');
		$this->redirect(array('action'=>'admin'));
	}
	public function a($id=null){
		$this->Session->write('typerecette','a');
		$this->redirect(array('action'=>'admin'));
	}*/
	public function tout($id=null){
		$this->Session->write('typerecette','tout');
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
		$post=$this->Recette->findById($id);
		if($post){
		$titredetest=$post['Recette']['nom'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Recette->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Recette->findById($id);
			if($post){
				$this->set('current_icon','icons/calculator.png');
				$this->set('current_controller','recettes/tout');
				$this->set('current_controllername','Comptabilité: Recettes');
				$this->set('current_iconview','icons/afficher.png');
				$this->set('current_view','recettes/view/'.$id."/".$titre);
				$this->set('current_iconviewname',"Recette: ".$post['Recette']['nom']);
				$this->set('title_for_layout',"Recette: ".$post['Recette']['nom']);
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
				$this->set('current_controller','recettes/tout');
				$this->set('current_controllername','Comptabilité: Recettes');
				$this->set('current_iconview','icons/ajouter.png');
				$this->set('current_view','recettes/add');
				$this->set('current_iconviewname',"Ajouter une recette");
				$this->set('title_for_layout',"Ajouter une recette");
	$this->layout = 'admin';
	$optioncat = $this->Stockcategorie->find('list', array('fields'=> array('Stockcategorie.id', 'Stockcategorie.nom'),'conditions'=>array('type'=>'recette')));
	$optionm =$this->Materiel->find('list', array('fields'=> array('Materiel.id', 'Materiel.nom')));
	$optionp =$this->Produit->find('list', array('fields'=> array('Produit.id', 'Produit.titre')));
	$optionser =$this->Service->find('list', array('fields'=> array('Service.id', 'Service.titre')));
	$optionf =$this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('Client.type = "client"')));
	$options =$this->Compte->find('list', array('fields'=> array('Compte.id', 'Compte.nom')));
	$this->set(compact('optioncat','optionf','optionm','optionp','optionser','options'));
		if($this->request->is('Post'))
		{
			$this->Recette->create();
			$employe=$this->Stockcategorie->findById($this->request->data['Recette']['categorie_id']);
			$this->request->data['Recette']['categorie_nom'] = $employe['Stockcategorie']['nom'];
			
			$c=$this->request->data['Recette']['article'];
			if($c == '1'){
				$this->request->data['Recette']['produit_id']=$this->request->data['Recette']['produit_id1'];
				$employe=$this->Materiel->findById($this->request->data['Recette']['produit_id']);
				$this->request->data['Recette']['produit_nom'] = $employe['Materiel']['nom'];
			}
			else if($c == '2'){
				$this->request->data['Recette']['produit_id']=$this->request->data['Recette']['produit_id2'];
				$employe=$this->Produit->findById($this->request->data['Recette']['produit_id']);
				$this->request->data['Recette']['produit_nom'] = $employe['Produit']['titre'];
			}
			else if($c == '3'){
				$this->request->data['Recette']['produit_id']=$this->request->data['Recette']['produit_id3'];
				$employe=$this->Service->findById($this->request->data['Recette']['produit_id']);
				$this->request->data['Recette']['produit_nom'] = $employe['Service']['titre'];
			}
			$employe=$this->Client->findById($this->request->data['Recette']['client_id']);
			$this->request->data['Recette']['client_nom'] = $employe['Client']['nom'];
			$employe=$this->Compte->findById($this->request->data['Recette']['compte_id']);
			$this->request->data['Recette']['compte_nom'] = $employe['Compte']['nom'];
			
			$tva=($this->request->data['Recette']['total']*$this->request->data['Recette']['tvaen'])/100;
			$this->request->data['Recette']['tva'] = $tva;
			
			$this->request->data['Recette']['user_id'] = $this->Auth->User('id');
			if($this->Recette->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Recettes";
				$this->request->data['Evennement']['logicielar']="إيرادات";
				$this->request->data['Evennement']['logicielen']="Receipts";
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
		if($this->Recette->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Recettes";
				$this->request->data['Evennement']['logicielar']="إيرادات";
				$this->request->data['Evennement']['logicielen']="Receipts";
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
				$this->set('current_controller','recettes/tout');
				$this->set('current_controllername','Comptabilité: Recettes');
				$this->set('current_iconview','icons/modifier.png');
				$this->set('current_view','recettes/modifier/'.$id);
				$this->set('current_iconviewname',"Modification d'une recette");
				$this->set('title_for_layout',"Modification d'une recette");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Recette->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide recette'));
		$this->Recette->id=$id;
		
		if(!$this->request->data){
			$this->request->data=$post;
			
				$optioncat = $this->Stockcategorie->find('list', array('fields'=> array('Stockcategorie.id', 'Stockcategorie.nom'),'conditions'=>array('type'=>'recette')));
				$optionm =$this->Materiel->find('list', array('fields'=> array('Materiel.id', 'Materiel.nom')));
				$optionp =$this->Produit->find('list', array('fields'=> array('Produit.id', 'Produit.titre')));
				$optionser =$this->Service->find('list', array('fields'=> array('Service.id', 'Service.titre')));
				$optionf =$this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('Client.type = "client"')));
				$options =$this->Compte->find('list', array('fields'=> array('Compte.id', 'Compte.nom')));
				$this->set(compact('optioncat','optionf','optionm','optionp','optionser','options'));
			}
		else{
			$employe=$this->Stockcategorie->findById($this->request->data['Recette']['categorie_id']);
			$this->request->data['Recette']['categorie_nom'] = $employe['Stockcategorie']['nom'];
			
			$c=$this->request->data['Recette']['article'];
			if($c == '1'){
				$this->request->data['Recette']['produit_id']=$this->request->data['Recette']['produit_id1'];
				$employe=$this->Materiel->findById($this->request->data['Recette']['produit_id']);
				$this->request->data['Recette']['produit_nom'] = $employe['Materiel']['nom'];
			}
			else if($c == '2'){
				$this->request->data['Recette']['produit_id']=$this->request->data['Recette']['produit_id2'];
				$employe=$this->Produit->findById($this->request->data['Recette']['produit_id']);
				$this->request->data['Recette']['produit_nom'] = $employe['Produit']['titre'];
			}
			else if($c == '3'){
				$this->request->data['Recette']['produit_id']=$this->request->data['Recette']['produit_id3'];
				$employe=$this->Service->findById($this->request->data['Recette']['produit_id']);
				$this->request->data['Recette']['produit_nom'] = $employe['Service']['titre'];
			}
			$tva=($this->request->data['Recette']['total']*$this->request->data['Recette']['tvaen'])/100;
			$this->request->data['Recette']['tva'] = $tva;
			$employe=$this->Client->findById($this->request->data['Recette']['client_id']);
			$this->request->data['Recette']['client_nom'] = $employe['Client']['nom'];
			$employe=$this->Compte->findById($this->request->data['Recette']['compte_id']);
			$this->request->data['Recette']['compte_nom'] = $employe['Compte']['nom'];
			if($this->Recette->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Recettes";
				$this->request->data['Evennement']['logicielar']="إيرادات";
				$this->request->data['Evennement']['logicielen']="Receipts";
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
				$this->set('current_controller','recettes/tout');
				$this->set('current_controllername','Comptabilité: Recettes');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','recettes/recherche');
				$this->set('current_iconviewname',"Recherche de recettes");
				$this->set('title_for_layout',"Recherche de recettes");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '3')
				$realisation=$this->Recette->find('all',array('conditions'=>array('Recette.ref='.$this->request->data['Recette']['refe'])));
			if($_POST['rechercher'] == '1')
				$realisation=$this->Recette->find('all',array('conditions'=>array('Recette.id='.$this->request->data['Recette']['ide'])));
			else if($_POST['rechercher'] == '2'){
			$dated=$this->request->data['Recette']['dated']['year']."-".$this->request->data['Recette']['dated']['month']."-".$this->request->data['Recette']['dated']['day'];
			$datef=$this->request->data['Recette']['datef']['year']."-".$this->request->data['Recette']['datef']['month']."-".$this->request->data['Recette']['datef']['day'];
			
			$conditions = array('Recette.date <=' => $datef, 'Recette.date >=' => $dated);
			$realisation=$this->Recette->find('all', array('conditions' => $conditions));
				//$realisation=$this->Recette->find('all',array('conditions'=>array('Recette.jusqua BETWEEN '.$dated.' AND '.$datef)));
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
		$post=$this->Recette->findById($id);
		if($post){
			$post=$this->Recette->findById($id);
			if($post){
				$this->set('title_for_layout',$post['Recette']['nom']);
				$this->set('post',$post);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Recettes";
				$this->request->data['Evennement']['logicielar']="إيرادات";
				$this->request->data['Evennement']['logicielen']="Receipts";
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