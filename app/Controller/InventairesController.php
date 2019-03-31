<?php
App::uses('AppController', 'Controller');

class InventairesController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Inventaire','Piece','Facture','Client','Stockcategorie','Contrat','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Inventaire.piece_nom'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Inventaire.date'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Inventaires']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Inventaire->isOwnedBy($postId,$user['id']))
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
	$date=date('Y-m-d');
	$id=$this->Session->read('data');
	if($this->Session->read('typeinventaire')=='marques'){
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','inventaires/marques');
				$this->set('current_iconviewname',"Marque: ".$id);
				$this->set('title_for_layout',"Marque: ");
		$post=$this->Paginator->paginate('Inventaire',array('marque_nom ='=>$id));
		}
	else if($this->Session->read('typeinventaire')=='familles'){
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','inventaires/familles');
				$this->set('current_iconviewname',"Famille: ".$id);
				$this->set('title_for_layout',"Famille: ".$id);
		$post=$this->Paginator->paginate('Inventaire',array('famille_nom ='=>$id));
		}
	else if($this->Session->read('typeinventaire')=='contratg'){
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','inventaires/contratg');
				$this->set('current_iconviewname',"Contrat de garantie: ".$id);
				$this->set('title_for_layout',"Contrat de garantie: ".$id);
		$post=$this->Paginator->paginate('Inventaire',array('contratg_nom ='=>$id));
		}
	else if($this->Session->read('typeinventaire')=='contratm'){
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','inventaires/contratm');
				$this->set('current_iconviewname',"Contrat de maintenance: ".$id);
				$this->set('title_for_layout',"Contrat de maintenance: ".$id);
		$post=$this->Paginator->paginate('Inventaire',array('contratm_nom ='=>$id));
		}
	else if($this->Session->read('typeinventaire')=='contrata'){
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','inventaires/contrata');
				$this->set('current_iconviewname',"Contrat d'assurance: ".$id);
				$this->set('title_for_layout',"Contrat d'assurance: ".$id);
		$post=$this->Paginator->paginate('Inventaire',array('contrata_nom ='=>$id));
		}
	else if($this->Session->read('typeinventaire')=='contratl'){
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','inventaires/contratl');
				$this->set('current_iconviewname',"Contrat de location: ".$id);
				$this->set('title_for_layout',"Contrat de location: ".$id);
		$post=$this->Paginator->paginate('Inventaire',array('contratl_nom ='=>$id));
		}
	else if($this->Session->read('typeinventaire')=='localisations'){
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','inventaires/localisations');
				$this->set('current_iconviewname',"Localisation: ".$id);
				$this->set('title_for_layout',"Localisation: ".$id);
		$post=$this->Paginator->paginate('Inventaire',array('piece_nom ='=>$id));
		}
	else if($this->Session->read('typeinventaire')=='fournisseurs'){
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','inventaires/fournisseurs');
				$this->set('current_iconviewname',"Fournisseur: ".$id);
				$this->set('title_for_layout',"Fournisseur: ".$id);
		$post=$this->Paginator->paginate('Inventaire',array('fournisseur_nom ='=>$id));
		}
	else if($this->Session->read('typeinventaire')=='cat1'){
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','inventaires/cat1');
				$this->set('current_iconviewname',"Catégorie: Meubles");
				$this->set('title_for_layout',"Catégorie: Meubles");
		$post=$this->Paginator->paginate('Inventaire',array('categorie ="Meubles"'));
		}
	else if($this->Session->read('typeinventaire')=='cat2'){
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','inventaires/cat2');
				$this->set('current_iconviewname',"Catégorie: Eletroménager");
				$this->set('title_for_layout',"Catégorie: Eletroménager");
		$post=$this->Paginator->paginate('Inventaire',array('categorie ="Eletroménager"'));
		}
	else if($this->Session->read('typeinventaire')=='cat3'){
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','inventaires/cat3');
				$this->set('current_iconviewname',"Catégorie: Informatique");
				$this->set('title_for_layout',"Catégorie: Informatique");
		$post=$this->Paginator->paginate('Inventaire',array('categorie ="Informatique"'));
		}
	else if($this->Session->read('typeinventaire')=='cat4'){
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','inventaires/cat4');
				$this->set('current_iconviewname',"Catégorie: Téléphonie");
				$this->set('title_for_layout',"Catégorie: Téléphonie");
		$post=$this->Paginator->paginate('Inventaire',array('categorie ="Téléphonie"'));
		}
	else if($this->Session->read('typeinventaire')=='cat5'){
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','inventaires/cat5');
				$this->set('current_iconviewname',"Catégorie: Hi-Tech");
				$this->set('title_for_layout',"Catégorie: Hi-Tech");
		$post=$this->Paginator->paginate('Inventaire',array('categorie ="Hi-Tech"'));
		}
	else if($this->Session->read('typeinventaire')=='cat6'){
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','inventaires/cat6');
				$this->set('current_iconviewname',"Catégorie: Véhicule");
				$this->set('title_for_layout',"Catégorie: Véhicule");
		$post=$this->Paginator->paginate('Inventaire',array('categorie ="Véhicule"'));
		}
	else if($this->Session->read('typeinventaire')=='cat7'){
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','inventaires/cat7');
				$this->set('current_iconviewname',"Autre Catégories");
				$this->set('title_for_layout',"Autre Catégories");
		$post=$this->Paginator->paginate('Inventaire',array('categorie ="Autres"'));
		}
	else{
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','inventaires/admin');
				$this->set('current_iconviewname',"Administration");
				$this->set('title_for_layout',"Administration");
		$post=$this->Paginator->paginate('Inventaire');
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
	
	/*
	$posts=$this->Inventaire->find('all',array('fields'=> array('Inventaire.piece_nom'),'group' => array('Inventaire.piece_nom HAVING COUNT(*) > 1')));
	foreach($posts as $post):
	//echo 1;
            echo $post['Inventaire']['piece_nom']."<br/>";
	endforeach;*/
	//print_r ($posts);
	if($this->Session->read('Auth.User.imprimerliste')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->set('title_for_layout',"L'inventaire");
	$this->layout = 'imprimer';
	$id=$this->Session->read('data');
	if($this->Session->read('typeinventaire')=='familles'){
		$post=$this->Inventaire->find('all',array('conditions'=>array('famille_nom ='=>$id)));
		$this->set('title_for_layout',"L'inventaire: ".$id);
		}
	else if($this->Session->read('typeinventaire')=='fournisseurs'){
		$post=$this->Inventaire->find('all',array('conditions'=>array('fournisseur_nom ='=>$id)));
		$this->set('title_for_layout',"L'inventaire: ".$id);
		}
	else if($this->Session->read('typeinventaire')=='localisations'){
		$post=$this->Inventaire->find('all',array('conditions'=>array('piece_nom ='=>$id)));
		$this->set('title_for_layout',"L'inventaire: ".$id);
		}
	else if($this->Session->read('rechercher')!=''){
                $id=$this->Session->read('rechercher');
		$post=$this->Inventaire->find('all',array('conditions'=>array('OR' => array('Inventaire.nom LIKE' => "%$id%"))));
		$this->set('title_for_layout',"L'inventaire: ".$id);
		}
	else
		$post=$this->Inventaire->find('all',array('order' => array('Inventaire.piece_nom desc')));
		//$post=$this->Inventaire->find('all',array('group' => array('Inventaire.nom HAVING COUNT(*) > 1')));
		$this->set(compact('post'));
		
		
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer liste";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Inventaire";
				$this->request->data['Evennement']['logicielar']="الممتلكات";
				$this->request->data['Evennement']['logicielen']="Goods";
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
	public function pieces($id=null){
		$this->Session->write('pieceheader','inventaire');
		$this->redirect(array('controller'=>'pieces','action'=>('admin')));
	}
	public function marquesheader($id=null){
		$this->Session->write('stockheader','inventaire');
		$this->redirect(array('controller'=>'stockcategories','action'=>('marques')));
	}
	public function famillesheader($id=null){
		$this->Session->write('stockheader','inventaire');
		$this->redirect(array('controller'=>'stockcategories','action'=>('familles')));
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
		$this->Session->write('typeinventaire','tout');
		$this->Session->write('rechercher','');
		$this->redirect(array('action'=>'admin'));
	}
	public function cat1($id=null){
		$this->Session->write('typeinventaire','cat1');
		$this->Session->write('rechercher','');
		$this->redirect(array('action'=>'admin'));
	}
	public function cat2($id=null){
		$this->Session->write('typeinventaire','cat2');
		$this->Session->write('rechercher','');
		$this->redirect(array('action'=>'admin'));
	}
	public function cat3($id=null){
		$this->Session->write('typeinventaire','cat3');
		$this->Session->write('rechercher','');
		$this->redirect(array('action'=>'admin'));
	}
	public function cat4($id=null){
		$this->Session->write('typeinventaire','cat4');
		$this->Session->write('rechercher','');
		$this->redirect(array('action'=>'admin'));
	}
	public function cat5($id=null){
		$this->Session->write('typeinventaire','cat5');
		$this->Session->write('rechercher','');
		$this->redirect(array('action'=>'admin'));
	}
	public function cat6($id=null){
		$this->Session->write('typeinventaire','cat6');
		$this->Session->write('rechercher','');
		$this->redirect(array('action'=>'admin'));
	}
	public function cat7($id=null){
		$this->Session->write('typeinventaire','cat7');
		$this->Session->write('rechercher','');
		$this->redirect(array('action'=>'admin'));
	}
	
	public function marques($id=null){
	$this->layout = 'admin';
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','inventaires/marques');
				$this->set('current_iconviewname',"Marques");
				$this->set('title_for_layout',"Marques");
		$this->Session->write('typeinventaire','marques');
		if($id){
			$this->Session->write('data',$id);
			$this->redirect(array('action'=>'admin'));
		}
		else{
		$post = $this->Stockcategorie->find('all', array('fields'=> array('Stockcategorie.nom'),'conditions'=>array('type="marque"')));
		$this->set(compact('post'));
		}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/marques');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/marques');
		}

	}
	public function familles($id=null){
	$this->layout = 'admin';
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','inventaires/familles');
				$this->set('current_iconviewname',"Familles");
				$this->set('title_for_layout',"Familles");
		$this->Session->write('typeinventaire','familles');
		if($id){
			$this->Session->write('data',$id);
			$this->redirect(array('action'=>'admin'));
		}
		else{
		$post = $this->Stockcategorie->find('all', array('fields'=> array('Stockcategorie.nom'),'conditions'=>array('type="famille"')));
		$this->set(compact('post'));
		}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/familles');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/familles');
		}

	}
	public function contratg($id=null){
	$this->layout = 'admin';
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','inventaires/contratg');
				$this->set('current_iconviewname',"Contrats de garantie");
				$this->set('title_for_layout',"Contrats de garantie");
		$this->Session->write('typeinventaire','contratg');
		if($id){
			$this->Session->write('data',$id);
			$this->redirect(array('action'=>'admin'));
		}
		else{
		$post = $this->Contrat->find('all', array('fields'=> array('Contrat.nom'),'conditions'=>array('type="Garantie"')));
		$this->set(compact('post'));
		}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/contratg');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/contratg');
		}

	}
	public function contratm($id=null){
	$this->layout = 'admin';
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','inventaires/contratm');
				$this->set('current_iconviewname',"Contrats de maintenance");
				$this->set('title_for_layout',"Contrats de maintenance");
		$this->Session->write('typeinventaire','contratm');
		if($id){
			$this->Session->write('data',$id);
			$this->redirect(array('action'=>'admin'));
		}
		else{
		$post = $this->Contrat->find('all', array('fields'=> array('Contrat.nom'),'conditions'=>array('type="Maintenance"')));
		$this->set(compact('post'));
		}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/contratm');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/contratm');
		}

	}
	public function contrata($id=null){
	$this->layout = 'admin';
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','inventaires/contrata');
				$this->set('current_iconviewname',"Contrats d'assurance");
				$this->set('title_for_layout',"Contrats d'assurance");
		$this->Session->write('typeinventaire','contrata');
		if($id){
			$this->Session->write('data',$id);
			$this->redirect(array('action'=>'admin'));
		}
		else{
		$post = $this->Contrat->find('all', array('fields'=> array('Contrat.nom'),'conditions'=>array('type="Assurance"')));
		$this->set(compact('post'));
		}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/contrata');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/contrata');
		}

	}
	public function contratl($id=null){
	$this->layout = 'admin';
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','inventaires/contratl');
				$this->set('current_iconviewname',"Contrats de location");
				$this->set('title_for_layout',"Contrats de location");
		$this->Session->write('typeinventaire','contratl');
		if($id){
			$this->Session->write('data',$id);
			$this->redirect(array('action'=>'admin'));
		}
		else{
		$post = $this->Contrat->find('all', array('fields'=> array('Contrat.nom'),'conditions'=>array('type="Location"')));
		$this->set(compact('post'));
		}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/contratl');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/contratl');
		}

	}
	public function localisations($id=null){
	$this->layout = 'admin';
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','inventaires/localisations');
				$this->set('current_iconviewname',"Localisations");
				$this->set('title_for_layout',"Localisations");
		$this->Session->write('typeinventaire','localisations');
		if($id){
			$this->Session->write('data',$id);
			$this->redirect(array('action'=>'admin'));
		}
		else{
		$post = $this->Client->find('all', array('fields'=> array('Client.nom'),'conditions'=>array('type="client"'),'order'=>array('Client.nom'=>'asc')));
		$this->set(compact('post'));
		}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/localisations');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/localisations');
		}

	}
	public function fournisseurs($id=null){
	$this->layout = 'admin';
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','inventaires/fournisseurs');
				$this->set('current_iconviewname',"Fournisseurs");
				$this->set('title_for_layout',"Fournisseurs");
		$this->Session->write('typeinventaire','fournisseurs');
		if($id){
			$this->Session->write('data',$id);
			$this->redirect(array('action'=>'admin'));
		}
		else{
		$post = $this->Client->find('all', array('fields'=> array('Client.nom'),'conditions'=>array('type="client"'),'order'=>array('Client.nom'=>'asc')));
		$this->set(compact('post'));
		}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/fournisseurs');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/fournisseurs');
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
		$post=$this->Inventaire->findById($id);
		if($post){
		$titredetest=$post['Inventaire']['nom'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Inventaire->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Inventaire->findById($id);
			if($post){
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/afficher.png');
				$this->set('current_view','inventaires/view/'.$id."/".$titre);
				$this->set('current_iconviewname',"FICHE D'ARTICLE d'inventaire: ".$post['Inventaire']['nom']);
				$this->set('title_for_layout',"FICHE D'ARTICLE d'inventaire: ".$post['Inventaire']['nom']);
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
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/ajouter.png');
				$this->set('current_view','inventaires/add');
				$this->set('current_iconviewname',"Ajouter un bien");
				$this->set('title_for_layout',"Ajouter un bien");
	$this->layout = 'admin';
	
    
	$optionsemp = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('type="client"'),'order'=>array('Client.nom'=>'asc')));
	$optionsfo = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('type="fournisseur"'),'order'=>array('Client.nom'=>'asc')));
	$optionsdes = $this->Stockcategorie->find('list', array('fields'=> array('Stockcategorie.id', 'Stockcategorie.nom'),'conditions'=>array('type="inventaire"'),'order'=>array('Stockcategorie.nom'=>'asc')));
	$optionsfam = $this->Stockcategorie->find('list', array('fields'=> array('Stockcategorie.id', 'Stockcategorie.nom'),'conditions'=>array('type="famille"'),'order'=>array('Stockcategorie.nom'=>'asc')));
	$optionsmar = $this->Stockcategorie->find('list', array('fields'=> array('Stockcategorie.id', 'Stockcategorie.nom'),'conditions'=>array('type="marque"'),'order'=>array('Stockcategorie.nom'=>'asc')));
	$this->set(compact('optionsemp','optionsfo','optionsfam','optionsmar','optionsdes'));
		if($this->request->is('Post')){
		
			$this->Inventaire->create();
			
			
			$employe=$this->Stockcategorie->findById($this->request->data['Inventaire']['nom_id']);
			$this->request->data['Inventaire']['nom'] = $employe['Stockcategorie']['nom'];
			
			$employe=$this->Client->findById($this->request->data['Inventaire']['fournisseur_id']);
			$this->request->data['Inventaire']['fournisseur_nom'] = $employe['Client']['nom'];
			
			$employe=$this->Client->findById($this->request->data['Inventaire']['piece_id']);
			$this->request->data['Inventaire']['piece_nom'] = $employe['Client']['nom'];
			
			$employe=$this->Stockcategorie->findById($this->request->data['Inventaire']['famille_id']);
			$this->request->data['Inventaire']['famille_nom'] = $employe['Stockcategorie']['nom'];
			
			$employe=$this->Stockcategorie->findById($this->request->data['Inventaire']['marque_id']);
			$this->request->data['Inventaire']['marque_nom'] = $employe['Stockcategorie']['nom'];
			/*
			$employe=$this->Piece->findById($this->request->data['Inventaire']['piece_id']);
			$this->request->data['Inventaire']['piece_nom'] = $employe['Piece']['nom'];
			$this->request->data['Inventaire']['cout']=$this->request->data['Inventaire']['qte']*$this->request->data['Inventaire']['prix'];
			
			$employe=$this->Client->findById($this->request->data['Inventaire']['fabricant_id']);
			$this->request->data['Inventaire']['fabricant_nom'] = $employe['Client']['nom'];
			
			$employe=$this->Facture->findById($this->request->data['Inventaire']['facture_id']);
			$this->request->data['Inventaire']['facture_nom'] = $employe['Facture']['nom'];
			
			
			$employe=$this->Stockcategorie->findById($this->request->data['Inventaire']['marque_id']);
			$this->request->data['Inventaire']['marque_nom'] = $employe['Stockcategorie']['nom'];
			
			if($this->request->data['Inventaire']['testcontratg']){
				$employe=$this->Contrat->findById($this->request->data['Inventaire']['contratg_id']);
				$this->request->data['Inventaire']['contratg_nom'] = $employe['Contrat']['nom'];
			}
			else{
				$this->request->data['Inventaire']['contratg_id']=0;
				$this->request->data['Inventaire']['contratg_nom']="aucun";
			}
			if($this->request->data['Inventaire']['testcontratm']){
				$employe=$this->Contrat->findById($this->request->data['Inventaire']['contratm_id']);
				$this->request->data['Inventaire']['contratm_nom'] = $employe['Contrat']['nom'];
			}
			else{
				$this->request->data['Inventaire']['contratm_id']=0;
				$this->request->data['Inventaire']['contratm_nom']="aucun";
			}
			if($this->request->data['Inventaire']['testcontrata']){
				$employe=$this->Contrat->findById($this->request->data['Inventaire']['contrata_id']);
				$this->request->data['Inventaire']['contrata_nom'] = $employe['Contrat']['nom'];
			}
			else{
				$this->request->data['Inventaire']['contrata_id']=0;
				$this->request->data['Inventaire']['contrata_nom']="aucun";
			}
			if($this->request->data['Inventaire']['testcontratl']){
				$employe=$this->Contrat->findById($this->request->data['Inventaire']['contratl_id']);
				$this->request->data['Inventaire']['contratg_nol'] = $employe['Contrat']['nom'];
			}
			else{
				$this->request->data['Inventaire']['contratl_id']=0;
				$this->request->data['Inventaire']['contratl_nom']="aucun";
			}*/
			$this->request->data['Inventaire']['user_id'] = $this->Auth->User('id');
			if($this->Inventaire->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Inventaire";
				$this->request->data['Evennement']['logicielar']="الممتلكات";
				$this->request->data['Evennement']['logicielen']="Goods";
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
		if($this->Inventaire->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Inventaire";
				$this->request->data['Evennement']['logicielar']="الممتلكات";
				$this->request->data['Evennement']['logicielen']="Goods";
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
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/modifier.png');
				$this->set('current_view','inventaires/modifier/'.$id);
				$this->set('current_iconviewname',"Modifier un bien");
				$this->set('title_for_layout',"Modifier un bien");
	$this->set('title_for_layout',"Modification d'inventaire");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Inventaire->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalid\'article'));
		$this->Inventaire->id=$id;
		
	$optionsemp = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('type="client"'),'order'=>array('Client.nom'=>'asc')));
	$optionsfo = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('type="fournisseur"'),'order'=>array('Client.nom'=>'asc')));
	$optionsdes = $this->Stockcategorie->find('list', array('fields'=> array('Stockcategorie.id', 'Stockcategorie.nom'),'conditions'=>array('type="inventaire"'),'order'=>array('Stockcategorie.nom'=>'asc')));
	$optionsfam = $this->Stockcategorie->find('list', array('fields'=> array('Stockcategorie.id', 'Stockcategorie.nom'),'conditions'=>array('type="famille"'),'order'=>array('Stockcategorie.nom'=>'asc')));
	$optionsmar = $this->Stockcategorie->find('list', array('fields'=> array('Stockcategorie.id', 'Stockcategorie.nom'),'conditions'=>array('type="marque"'),'order'=>array('Stockcategorie.nom'=>'asc')));
	$this->set(compact('optionsemp','optionsfo','optionsfam','optionsmar','optionsdes'));
		
		if(!$this->request->data)
			$this->request->data=$post;
		else{
		
			
			$employe=$this->Stockcategorie->findById($this->request->data['Inventaire']['nom_id']);
			$this->request->data['Inventaire']['nom'] = $employe['Stockcategorie']['nom'];
			
			$employe=$this->Client->findById($this->request->data['Inventaire']['fournisseur_id']);
			$this->request->data['Inventaire']['fournisseur_nom'] = $employe['Client']['nom'];
			
			$employe=$this->Stockcategorie->findById($this->request->data['Inventaire']['famille_id']);
			$this->request->data['Inventaire']['famille_nom'] = $employe['Stockcategorie']['nom'];
			
			$employe=$this->Client->findById($this->request->data['Inventaire']['piece_id']);
			$this->request->data['Inventaire']['piece_nom'] = $employe['Client']['nom'];
			/*$this->request->data['Inventaire']['cout']=$this->request->data['Inventaire']['qte']*$this->request->data['Inventaire']['prix'];
			$employe=$this->Client->findById($this->request->data['Inventaire']['fournisseur_id']);
			$this->request->data['Inventaire']['fournisseur_nom'] = $employe['Client']['nom'];
			
			$employe=$this->Client->findById($this->request->data['Inventaire']['fabricant_id']);
			$this->request->data['Inventaire']['fabricant_nom'] = $employe['Client']['nom'];
			
			$employe=$this->Facture->findById($this->request->data['Inventaire']['facture_id']);
			$this->request->data['Inventaire']['facture_nom'] = $employe['Facture']['nom'];
			
			$employe=$this->Stockcategorie->findById($this->request->data['Inventaire']['famille_id']);
			$this->request->data['Inventaire']['famille_nom'] = $employe['Stockcategorie']['nom'];
			
						if($this->request->data['Inventaire']['testcontratg']){
				$employe=$this->Contrat->findById($this->request->data['Inventaire']['contratg_id']);
				$this->request->data['Inventaire']['contratg_nom'] = $employe['Contrat']['nom'];
			}
			else{
				$this->request->data['Inventaire']['contratg_id']=0;
				$this->request->data['Inventaire']['contratg_nom']="aucun";
			}
			if($this->request->data['Inventaire']['testcontratm']){
				$employe=$this->Contrat->findById($this->request->data['Inventaire']['contratm_id']);
				$this->request->data['Inventaire']['contratm_nom'] = $employe['Contrat']['nom'];
			}
			else{
				$this->request->data['Inventaire']['contratm_id']=0;
				$this->request->data['Inventaire']['contratm_nom']="aucun";
			}
			if($this->request->data['Inventaire']['testcontrata']){
				$employe=$this->Contrat->findById($this->request->data['Inventaire']['contrata_id']);
				$this->request->data['Inventaire']['contrata_nom'] = $employe['Contrat']['nom'];
			}
			else{
				$this->request->data['Inventaire']['contrata_id']=0;
				$this->request->data['Inventaire']['contrata_nom']="aucun";
			}
			if($this->request->data['Inventaire']['testcontratl']){
				$employe=$this->Contrat->findById($this->request->data['Inventaire']['contratl_id']);
				$this->request->data['Inventaire']['contratg_nol'] = $employe['Contrat']['nom'];
			}
			else{
				$this->request->data['Inventaire']['contratl_id']=0;
				$this->request->data['Inventaire']['contratl_nom']="aucun";
			}
			
			$employe=$this->Stockcategorie->findById($this->request->data['Inventaire']['marque_id']);
			$this->request->data['Inventaire']['marque_nom'] = $employe['Stockcategorie']['nom'];*/
		if($this->Inventaire->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Inventaire";
				$this->request->data['Evennement']['logicielar']="الممتلكات";
				$this->request->data['Evennement']['logicielen']="Goods";
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
				$this->set('current_icon','icons/box.png');
				$this->set('current_controller','inventaires/tous');
				$this->set('current_controllername','Inventaire');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','inventaires/recherche');
				$this->set('current_iconviewname',"Recherche de biens");
				$this->set('title_for_layout',"Recherche de biens");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '3')
				$realisation=$this->Inventaire->find('all',array('conditions'=>array('Inventaire.id='.$this->request->data['Inventaire']['ide'])));
			else if($_POST['rechercher'] == '2'){
			$dated=$this->request->data['Inventaire']['dated']['year']."-".$this->request->data['Inventaire']['dated']['month']."-".$this->request->data['Inventaire']['dated']['day'];
			$datef=$this->request->data['Inventaire']['datef']['year']."-".$this->request->data['Inventaire']['datef']['month']."-".$this->request->data['Inventaire']['datef']['day'];
			
			$conditions = array('Inventaire.created <=' => $datef, 'Inventaire.created >=' => $dated);
			$realisation=$this->Inventaire->find('all', array('conditions' => $conditions));
			}
			else if($_POST['rechercher'] == '1'){
                                $cle=$this->request->data['Inventaire']['serie'];
				$realisation=$realisation=$this->Inventaire->find('all',array('conditions'=>array('OR' => array('Inventaire.nom LIKE' => "%$cle%"))));
                                $this->Session->write('rechercher',$cle);
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
		$post=$this->Inventaire->findById($id);
		if($post){
			//$post=$this->Inventaire->findById($id);
			if($post){
				$this->set('title_for_layout',"FICHE D'ARTICLE: ".$post['Inventaire']['nom']);
				$this->set('post',$post);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Inventaire";
				$this->request->data['Evennement']['logicielar']="الممتلكات";
				$this->request->data['Evennement']['logicielen']="Goods";
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
