<?php
App::uses('AppController', 'Controller');

class DepensesController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Depense','Stockcategorie','Client','Compte','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Depense.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Depense.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Depenses']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Depense->isOwnedBy($postId,$user['id']))
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
	if($this->Session->read('typedepense')=='cat'){
		$data=$this->Session->read('datadepense');
		$post=$this->Paginator->paginate('Depense',array('categorie_id '=>$data));
		$options=$this->Stockcategorie->find('first', array('fields'=> array('Stockcategorie.nom'),'conditions'=>array('id'=>$data)));
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','depenses/tout');
			$this->set('current_controllername','Comptabilité: Dépenses');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','categories/'.$data);
			$this->set('current_iconviewname','Catégorie: '.$options['Stockcategorie']['nom']);
			$this->set('title_for_layout',"Catégorie: ".$options['Stockcategorie']['nom']);
	}
	else{
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','depenses/tout');
			$this->set('current_controllername','Comptabilité: Dépenses');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','depenses/admin');
			$this->set('current_iconviewname','Administration');
			$this->set('title_for_layout',"Administration");
		$post=$this->Paginator->paginate('Depense');
		}
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
	$this->set('title_for_layout',"Liste de depenses");
	$this->layout = 'imprimer';
	if($this->Session->read('typedepense')=='cat'){
		$data=$this->Session->read('datadepense');
		$post=$this->Depense->find('all',array('conditions'=>array('categorie_id '=>$data)));
	}
	else
		$post=$this->Depense->find('all');
		$this->set(compact('post'));
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer Liste";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print List";
				$this->request->data['Evennement']['logiciel']="Dépenses";
				$this->request->data['Evennement']['logicielar']="مصاريف";
				$this->request->data['Evennement']['logicielen']="Spending";
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
	public function cats(){
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','depenses/tout');
			$this->set('current_controllername','Comptabilité: Dépenses');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','depenses/cats');
			$this->set('current_iconviewname','Dépenses par categories');
			$this->set('title_for_layout',"Dépenses par categories");
	$this->layout = 'admin';
	$options=$this->Stockcategorie->find('all', array('fields'=> array('Stockcategorie.id', 'Stockcategorie.nom'),'conditions'=>array('type'=>'depense')));
	$this->set(compact('options'));
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/cats');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/cats');
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
		$this->Session->write('typedepense','cat');
		if($id){
			$this->Session->write('datadepense',$id);
		}
			$this->redirect(array('action'=>'admin'));
	}
	/*
	public function t($id=null){
		$this->Session->write('typedepense','t');
		$this->redirect(array('action'=>'admin'));
	}
	public function e($id=null){
		$this->Session->write('typedepense','e');
		$this->redirect(array('action'=>'admin'));
	}
	public function a($id=null){
		$this->Session->write('typedepense','a');
		$this->redirect(array('action'=>'admin'));
	}*/
	public function tout($id=null){
		$this->Session->write('typedepense','tout');
		$this->redirect(array('action'=>'admin'));
	}
	
	public function view($id=null,$titre=null){
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','depenses/tout');
			$this->set('current_controllername','Comptabilité: Dépenses');
			$this->set('current_iconview','icons/afficher.png');
			$this->set('current_view','depenses/view/'.$id."/".$titre);
			$this->set('current_iconviewname','Dépense: '.$titre);
			$this->set('title_for_layout',"Dépense: ".$titre);
	$this->layout = 'admin';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		if(!$titre){
		$this->redirect(array('action'=>'../'));
		}
		$post=$this->Depense->findById($id);
		if($post){
		$titredetest=$post['Depense']['nom'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Depense->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Depense->findById($id);
			if($post){
				$this->set('title_for_layout',$post['Depense']['nom']);
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
			$this->set('current_controller','depenses/tout');
			$this->set('current_controllername','Comptabilité: Dépenses');
			$this->set('current_iconview','icons/ajouter.png');
			$this->set('current_view','depenses/add');
			$this->set('current_iconviewname','Ajouter une depense');
			$this->set('title_for_layout',"Ajouter une depense");
	$this->layout = 'admin';
	$optioncat = $this->Stockcategorie->find('list', array('fields'=> array('Stockcategorie.id', 'Stockcategorie.nom'),'conditions'=>array('type'=>'depense')));
	$optionf =$this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('Client.type <> "client"')));
	$options =$this->Compte->find('list', array('fields'=> array('Compte.id', 'Compte.nom')));
	$this->set(compact('optioncat','optionf','options'));
		if($this->request->is('Post'))
		{
			$this->Depense->create();
			$employe=$this->Stockcategorie->findById($this->request->data['Depense']['categorie_id']);
			$this->request->data['Depense']['categorie_nom'] = $employe['Stockcategorie']['nom'];
			$employe=$this->Client->findById($this->request->data['Depense']['fournisseur_id']);
			$this->request->data['Depense']['fournisseur_nom'] = $employe['Client']['nom'];
			$employe=$this->Compte->findById($this->request->data['Depense']['compte_id']);
			$this->request->data['Depense']['compte_nom'] = $employe['Compte']['nom'];
			
			$tva=($this->request->data['Depense']['payee']*$this->request->data['Depense']['tvaen'])/100;
			$this->request->data['Depense']['tva'] = $tva;
			
			$this->request->data['Depense']['user_id'] = $this->Auth->User('id');
			if($this->Depense->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Dépenses";
				$this->request->data['Evennement']['logicielar']="مصاريف";
				$this->request->data['Evennement']['logicielen']="Spending";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
				$this->Session->setFlash($this->addmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
				return $this->redirect(array('action'=>'admin'));
			}
			throw new NotFoundException($this->notfoundmessage);
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
		if($this->Depense->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Dépenses";
				$this->request->data['Evennement']['logicielar']="مصاريف";
				$this->request->data['Evennement']['logicielen']="Spending";
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
			$this->set('current_controller','depenses/tout');
			$this->set('current_controllername','Comptabilité: Dépenses');
			$this->set('current_iconview','icons/modifier.png');
			$this->set('current_view','depenses/modifier/'.$id);
			$this->set('current_iconviewname','Modification d\'une depense');
			$this->set('title_for_layout',"Modification d'une depense");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Depense->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide depense'));
		$this->Depense->id=$id;
		
		if(!$this->request->data){
			$this->request->data=$post;
			
				$optioncat = $this->Stockcategorie->find('list', array('fields'=> array('Stockcategorie.id', 'Stockcategorie.nom'),'conditions'=>array('type'=>'depense')));
				$optionf =$this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('Client.type <> "client"')));
				$options =$this->Compte->find('list', array('fields'=> array('Compte.id', 'Compte.nom')));
				$this->set(compact('optioncat','optionf','options'));
			}
		else{
			$employe=$this->Stockcategorie->findById($this->request->data['Depense']['categorie_id']);
			$this->request->data['Depense']['categorie_nom'] = $employe['Stockcategorie']['nom'];
			$employe=$this->Client->findById($this->request->data['Depense']['fournisseur_id']);
			$this->request->data['Depense']['fournisseur_nom'] = $employe['Client']['nom'];
			$employe=$this->Compte->findById($this->request->data['Depense']['compte_id']);
			$this->request->data['Depense']['compte_nom'] = $employe['Compte']['nom'];
			
			$tva=($this->request->data['Depense']['payee']*$this->request->data['Depense']['tvaen'])/100;
			$this->request->data['Depense']['tva'] = $tva;
			
			if($this->Depense->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Dépenses";
				$this->request->data['Evennement']['logicielar']="مصاريف";
				$this->request->data['Evennement']['logicielen']="Spending";
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
			$this->set('current_controller','depenses/tout');
			$this->set('current_controllername','Comptabilité: Dépenses');
			$this->set('current_iconview','icons/rechercher.png');
			$this->set('current_view','depenses/recherche');
			$this->set('current_iconviewname','Recherche de depenses');
			$this->set('title_for_layout',"Recherche de depenses");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '3')
				$realisation=$this->Depense->find('all',array('conditions'=>array('Depense.ref='.$this->request->data['Depense']['refe'])));
			if($_POST['rechercher'] == '1')
				$realisation=$this->Depense->find('all',array('conditions'=>array('Depense.id='.$this->request->data['Depense']['ide'])));
			else if($_POST['rechercher'] == '2'){
			$dated=$this->request->data['Depense']['dated']['year']."-".$this->request->data['Depense']['dated']['month']."-".$this->request->data['Depense']['dated']['day'];
			$datef=$this->request->data['Depense']['datef']['year']."-".$this->request->data['Depense']['datef']['month']."-".$this->request->data['Depense']['datef']['day'];
			
			$conditions = array('Depense.date <=' => $datef, 'Depense.date >=' => $dated);
			$realisation=$this->Depense->find('all', array('conditions' => $conditions));
				//$realisation=$this->Depense->find('all',array('conditions'=>array('Depense.jusqua BETWEEN '.$dated.' AND '.$datef)));
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
		$post=$this->Depense->findById($id);
		if($post){
			//$post=$this->Depense->findById($id);
			if($post){
				$this->set('title_for_layout',"Dépense: ".$post['Depense']['nom']);
				$this->set('post',$post);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Dépenses";
				$this->request->data['Evennement']['logicielar']="مصاريف";
				$this->request->data['Evennement']['logicielen']="Spending";
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