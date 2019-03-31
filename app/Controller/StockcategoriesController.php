<?php
App::uses('AppController', 'Controller');

class StockcategoriesController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Stockcategorie','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Stockcategorie.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Stockcategorie.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Stockcategories']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Stockcategorie->isOwnedBy($postId,$user['id']))
				return true;
			else if($user['role']!=='admin')
				$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		}
		return parent::isAuthorized($user);
	}
	
	public function admin(){
	$this->set('title_for_layout',"Gestion des enregistrements");
	$this->layout = 'admin';
		$this->Paginator->settings=$this->paginate;
	if($this->Session->read('tri')=='desc')
		$this->Paginator->settings=$this->paginatedesc;
	if($this->Session->read('typestock')=='i'){
				$this->set('current_icon','icons/text_columns.png');
				$this->set('current_controller','stockcategories/admin');
				$this->set('current_controllername','Catégories');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','stockcategories/imputations');
				$this->set('current_iconviewname',"Imputation");
				$this->set('title_for_layout',"Imputation");
		$post=$this->Paginator->paginate('Stockcategorie',array('type'=>'imputation'));
		}
	else if($this->Session->read('typestock')=='m'){
				$this->set('current_icon','icons/text_columns.png');
				$this->set('current_controller','stockcategories/admin');
				$this->set('current_controllername','Catégories');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','stockcategories/marques');
				$this->set('current_iconviewname',"Les marques");
				$this->set('title_for_layout',"Les marques");
		$post=$this->Paginator->paginate('Stockcategorie',array('type'=>'marque'));
		}
	else if($this->Session->read('typestock')=='f'){
				$this->set('current_icon','icons/text_columns.png');
				$this->set('current_controller','stockcategories/admin');
				$this->set('current_controllername','Catégories');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','stockcategories/familles');
				$this->set('current_iconviewname',"Les familles");
				$this->set('title_for_layout',"Les familles");
		$post=$this->Paginator->paginate('Stockcategorie',array('type'=>'famille'));
		}
	else if($this->Session->read('typestock')=='d'){
				$this->set('current_icon','icons/text_columns.png');
				$this->set('current_controller','stockcategories/admin');
				$this->set('current_controllername','Catégories');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','stockcategories/depenses');
				$this->set('current_iconviewname',"Les dépenses");
				$this->set('title_for_layout',"Les dépenses");
		$post=$this->Paginator->paginate('Stockcategorie',array('type'=>'depense'));
		}
	else if($this->Session->read('typestock')=='r'){
				$this->set('current_icon','icons/text_columns.png');
				$this->set('current_controller','stockcategories/admin');
				$this->set('current_controllername','Catégories');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','stockcategories/recettes');
				$this->set('current_iconviewname',"Les recettes");
				$this->set('title_for_layout',"Les recettes");
		$post=$this->Paginator->paginate('Stockcategorie',array('type'=>'recette'));
		}
	else if($this->Session->read('typestock')=='inventaire'){
				$this->set('current_icon','icons/text_columns.png');
				$this->set('current_controller','stockcategories/admin');
				$this->set('current_controllername','Désignations');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','stockcategories/inventaire');
				$this->set('current_iconviewname',"Les Désignations d'inventaire");
				$this->set('title_for_layout',"Les Désignations d'inventaire");
		$post=$this->Paginator->paginate('Stockcategorie',array('type'=>'inventaire'));
		}
	else{
				$this->set('current_icon','icons/text_columns.png');
				$this->set('current_controller','stockcategories/admin');
				$this->set('current_controllername','Catégories');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','stockcategories/admin');
				$this->set('current_iconviewname',"Administration");
				$this->set('title_for_layout',"Administration");
		$post=$this->Paginator->paginate('Stockcategorie');
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
		$post=$this->Stockcategorie->findById($id);
		if($post){
		$titredetest=$post['Stockcategorie']['nom'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Stockcategorie->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Stockcategorie->findById($id);
			if($post){
				$this->set('current_icon','icons/text_columns.png');
				$this->set('current_controller','stockcategories/admin');
				$this->set('current_controllername','Catégories');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','stockcategories/view/'.$id."/".$titre);
				$this->set('current_iconviewname',$post['Stockcategorie']['nom']);
				$this->set('title_for_layout',$post['Stockcategorie']['nom']);
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
				$this->set('current_icon','icons/text_columns.png');
				$this->set('current_controller','stockcategories/admin');
				$this->set('current_controllername','Catégories');
				$this->set('current_iconview','icons/ajouter.png');
				$this->set('current_view','stockcategories/add');
				$this->set('current_iconviewname',"Ajouter un enregistrements");
				$this->set('title_for_layout',"Ajouter un enregistrements");
	$this->layout = 'admin';
		if($this->request->is('Post'))
		{
			$this->Stockcategorie->create();
			if($this->Session->read('typestock')=='i')
				$this->request->data['Stockcategorie']['type']='imputation';
			else if($this->Session->read('typestock')=='m')
				$this->request->data['Stockcategorie']['type']='marque';
			else if($this->Session->read('typestock')=='f')
				$this->request->data['Stockcategorie']['type']='famille';
			else if($this->Session->read('typestock')=='d')
				$this->request->data['Stockcategorie']['type']='depense';
			else if($this->Session->read('typestock')=='r')
				$this->request->data['Stockcategorie']['type']='recette';
			else
				$this->request->data['Stockcategorie']['type']='inventaire';
			$this->request->data['Stockcategorie']['user_id'] = $this->Auth->User('id');
			if($this->Stockcategorie->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Categories";
				$this->request->data['Evennement']['logicielar']="فئات";
				$this->request->data['Evennement']['logicielen']="Labels";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
			
				$this->Session->setFlash($this->addmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
				//return $this->redirect(array('action'=>'admin'));
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
		if($this->Stockcategorie->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Categories";
				$this->request->data['Evennement']['logicielar']="فئات";
				$this->request->data['Evennement']['logicielen']="Labels";
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
				$this->set('current_icon','icons/text_columns.png');
				$this->set('current_controller','stockcategories/admin');
				$this->set('current_controllername','Catégories');
				$this->set('current_iconview','icons/modifier.png');
				$this->set('current_view','stockcategories/modifier');
				$this->set('current_iconviewname',"Modification d'un enregistrement");
				$this->set('title_for_layout',"Modification d'un enregistrement");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Stockcategorie->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide enregistrements'));
		$this->Stockcategorie->id=$id;
		
		if(!$this->request->data)
			$this->request->data=$post;
		else if($this->Stockcategorie->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Categories";
				$this->request->data['Evennement']['logicielar']="فئات";
				$this->request->data['Evennement']['logicielen']="Labels";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
			
			$this->Session->setFlash($this->editmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
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
				$this->set('current_icon','icons/text_columns.png');
				$this->set('current_controller','stockcategories/admin');
				$this->set('current_controllername','Catégories');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','stockcategories/recherche');
				$this->set('current_iconviewname',"Recherche d'enregistrements");
				$this->set('title_for_layout',"Recherche d'enregistrements");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '2')
				$realisation=$this->Stockcategorie->find('all',array('conditions'=>array('Stockcategorie.id='.$this->request->data['Stockcategorie']['ide'])));
			else if($_POST['rechercher'] == '1'){
				$cle=$this->request->data['Stockcategorie']['nom1'];
				$realisation=$this->Stockcategorie->find('all',array('conditions'=>array('OR' => array('Stockcategorie.nom LIKE' => "%$cle%"))));
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
	$this->set('title_for_layout',"Rapport d'un enregistrement");
	$this->layout = 'imprimer';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		$post=$this->Stockcategorie->findById($id);
		if($post){
			//$post=$this->Stockcategorie->findById($id);
			if($post){ 
				$this->set('post',$post);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Categories";
				$this->request->data['Evennement']['logicielar']="فئات";
				$this->request->data['Evennement']['logicielen']="Labels";
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
	$this->set('title_for_layout',"Liste d'enregistrements");
	$this->layout = 'imprimer';
	if($this->Session->read('typestock')=='i')
		$post=$this->Stockcategorie->find('all',array('conditions'=>array('type'=>'imputation')));
	else if($this->Session->read('typestock')=='m')
		$post=$this->Stockcategorie->find('all',array('conditions'=>array('type'=>'marque')));
	else if($this->Session->read('typestock')=='f')
		$post=$this->Stockcategorie->find('all',array('conditions'=>array('type'=>'famille')));
	else if($this->Session->read('typestock')=='d')
		$post=$this->Stockcategorie->find('all',array('conditions'=>array('type'=>'depense')));
	else if($this->Session->read('typestock')=='r')
		$post=$this->Stockcategorie->find('all',array('conditions'=>array('type'=>'recette')));
	else if($this->Session->read('typestock')=='inventaire'){
		$post=$this->Stockcategorie->find('all',array('conditions'=>array('type'=>'inventaire')));
		$this->set('title_for_layout',"Liste d'inventaire");
		}
	else
		$post=$this->Stockcategorie->find('all');
		$this->set(compact('post'));
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer liste";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Categories";
				$this->request->data['Evennement']['logicielar']="فئات";
				$this->request->data['Evennement']['logicielen']="Labels";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
			
		 if($pdf=="pdf"){
						$name=$this->request->params['controller']."_liste_".md5(time());
						$this->layout = 'imprimerpdf';
						$this->Mpdf->init();
						$this->Mpdf->setAutoTopMargin = 'stretch';
						$this->Mpdf->setAutoBottomMargin = 'stretch';
						$view = new View($this, false);
                                                $header = $view->element('imprimerheaderpdf');
                                                $footer = $view->element('imprimerfooter');
						$this->Mpdf->SetHTMLHeader($header);
						$this->Mpdf->SetHTMLFooter("<font size='1'>Page {PAGENO} de {nb}</font>".$footer);
						$this->Mpdf->SetHTMLFooter($footer);
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
	public function imputations($id=null){
		$this->Session->write('typestock','i');
		$this->redirect(array('action'=>'admin'));
	}
	public function marques($id=null){
		$this->Session->write('typestock','m');
		$this->redirect(array('action'=>'admin'));
	}
	public function familles($id=null){
		$this->Session->write('typestock','f');
		$this->redirect(array('action'=>'admin'));
	}
	public function inventaire($id=null){
		$this->Session->write('typestock','inventaire');
		$this->redirect(array('action'=>'admin'));
	}
	public function depenses($id=null){
		$this->Session->write('typestock','d');
		$this->redirect(array('action'=>'admin'));
	}
	public function recettes($id=null){
		$this->Session->write('typestock','r');
		$this->redirect(array('action'=>'admin'));
	}

} // fin de "appcontroller"
?>
