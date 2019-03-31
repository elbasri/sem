<?php
App::uses('AppController', 'Controller');

class MaterielsController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Materiel','Piece','Commande','Client','Stockcategorie','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Materiel.modified'=>'desc'));
	public $paginateasc= array('limit'=>'10','order'=>array('Materiel.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Materiel.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Materiels']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Materiel->isOwnedBy($postId,$user['id']))
				return true;
			else if($user['role']!=='admin')
				$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		}
		return parent::isAuthorized($user);
	}
	public function encoyer(){$this->set('title_for_layout',"Gestion d'articles");}
	public function admin(){
	$this->set('title_for_layout',"Gestion d'articles");
	$this->layout = 'admin';
	if($this->Session->read('tri')=='asc')
		$this->Paginator->settings=$this->paginateasc;
	if($this->Session->read('tri')=='desc')
		$this->Paginator->settings=$this->paginatedesc;
        else
            $this->Paginator->settings=$this->paginate;
	$date=date('Y-m-d');
	if($this->Session->read('typearticle')=='t'){
				$this->set('current_icon','icons/building.png');
				$this->set('current_controller','materiels/tout');
				$this->set('current_controllername','Stock: articles');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','materiels/t');
				$this->set('current_iconviewname',"Articles Expirés");
				$this->set('title_for_layout',"Articles Expirés");
		$post=$this->Paginator->paginate('Materiel',array('datef <'=>$date));
		}
	else if($this->Session->read('typearticle')=='materiel'){
				$this->set('current_icon','icons/building.png');
				$this->set('current_controller','materiels/tout');
				$this->set('current_controllername','Stock: articles');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','materiels/materiel');
				$this->set('current_iconviewname',"Matériel");
				$this->set('title_for_layout',"Matériel");
		$post=$this->Paginator->paginate('Materiel',
                                                    array(
                                                            'or'=> array(
                                                                array("Materiel.typemateriel LIKE" => "Matériel mobilier de bureau"),
                                                                array("Materiel.typemateriel LIKE" => "Matériel informatique"),
                                                                array("Materiel.typemateriel LIKE" => "Matériel medicoHospitalier"),
                                                                array("Materiel.typemateriel LIKE" => "Matériel medicoTechnique"),
                                                                array("Materiel.typemateriel LIKE" => "Matériel d'exploitation")
                                                            )
                                                        )
                                                );
		}
	else if($this->Session->read('typearticle')=='fourniture'){
				$this->set('current_icon','icons/building.png');
				$this->set('current_controller','materiels/tout');
				$this->set('current_controllername','Stock: articles');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','materiels/fourniture');
				$this->set('current_iconviewname',"Fourniture");
				$this->set('title_for_layout',"Matériel");
		$post=$this->Paginator->paginate('Materiel',
                                                    array(
                                                            'or'=> array(
                                                                array("Materiel.typemateriel LIKE" => "Fourniture de bureau"),
                                                                array("Materiel.typemateriel LIKE" => "Fourniture informatique")
                                                            )
                                                        )
                                                );
		}
	else if($this->Session->read('typearticle')=='produit'){
				$this->set('current_icon','icons/building.png');
				$this->set('current_controller','materiels/tout');
				$this->set('current_controllername','Stock: articles');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','materiels/produit');
				$this->set('current_iconviewname',"Produit");
				$this->set('title_for_layout',"Produit");
		$post=$this->Paginator->paginate('Materiel',array('typemateriel'=>"Produits d'hygiène"));
		}
	else if($this->Session->read('typearticle')=='e'){
				$this->set('current_icon','icons/building.png');
				$this->set('current_controller','materiels/tout');
				$this->set('current_controllername','Stock: articles');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','materiels/e');
				$this->set('current_iconviewname',"Articles Conservés");
				$this->set('title_for_layout',"Articles Conservés");
		$post=$this->Paginator->paginate('Materiel',array('datef >='=>$date));
		}
	else if($this->Session->read('typearticle')=='z'){
				$this->set('current_icon','icons/building.png');
				$this->set('current_controller','materiels/tout');
				$this->set('current_controllername','Stock: articles');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','materiels/z');
				$this->set('current_iconviewname',"Articles en Zéro Quantité");
				$this->set('title_for_layout',"Articles  en Zéro Quantité");
		$post=$this->Paginator->paginate('Materiel',array('qte <= 0'));
		}
	else if($this->Session->read('typearticle')=='nz'){
				$this->set('current_icon','icons/building.png');
				$this->set('current_controller','materiels/tout');
				$this->set('current_controllername','Stock: articles');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','materiels/z');
				$this->set('current_iconviewname',"Articles en Zéro Quantité");
				$this->set('title_for_layout',"Articles  en Zéro Quantité");
		$post=$this->Paginator->paginate('Materiel',array('qte > 0'));
		}
	else if($this->Session->read('typearticle')=='min'){
				$this->set('current_icon','icons/building.png');
				$this->set('current_controller','materiels/tout');
				$this->set('current_controllername','Stock: articles');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','materiels/min');
				$this->set('current_iconviewname',"Articles Inférieur que le minimum");
				$this->set('title_for_layout',"Articles Inférieur que le minimum");
		$post=$this->Paginator->paginate('Materiel',array('qte <= min'));
		}
	else if($this->Session->read('typearticle')=='max'){
				$this->set('current_icon','icons/building.png');
				$this->set('current_controller','materiels/tout');
				$this->set('current_controllername','Stock: articles');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','materiels/max');
				$this->set('current_iconviewname',"Articles Supérieur que le maximum");
				$this->set('title_for_layout',"Articles Supérieur que le maximum");
		$post=$this->Paginator->paginate('Materiel',array('qte >= max'));
		}
	else if($this->Session->read('typearticle')=='cat'){
				$this->set('current_icon','icons/building.png');
				$this->set('current_controller','materiels/tout');
				$this->set('current_controllername','Stock: articles');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','materiels/categories/'.$this->Session->read('typearticles'));
				$this->set('current_iconviewname',$this->Session->read('typearticless'));
				$this->set('title_for_layout',$this->Session->read('typearticless'));
		$data=$this->Session->read('typearticles');
		$post=$this->Paginator->paginate('Materiel',array('piece_id ='.$data));
		}
	else{
				$this->set('current_icon','icons/building.png');
				$this->set('current_controller','materiels/tout');
				$this->set('current_controllername','Stock: articles');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','materiels/tout');
				$this->set('current_iconviewname',"Administration");
				$this->set('title_for_layout',"Administration");
		
		$post=$this->Paginator->paginate('Materiel');
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
	$this->set('title_for_layout',"Liste des Matériels, Fournitures et Produits d'hygiènes");
	$this->layout = 'imprimer';
	if($this->Session->read('typearticle')=='t'){
		$bureau=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel Mobilier de bureau','datef <'=>$date)));
		$informatique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel informatique','datef <'=>$date)));
		$medicoHospitalier=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel medicoHospitalier','datef <'=>$date)));
		$medicoTechnique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel medicoTechnique','datef <'=>$date)));
		$exploitation=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>"Matériel d'exploitation",'datef <'=>$date)));
		$fbureau=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Fourniture de bureau','datef <'=>$date)));
		$finformatique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Fourniture informatique','datef <'=>$date)));
		$hygiene=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>"Produits d'hygiène",'datef <'=>$date)));
	}
	else if($this->Session->read('typearticle')=='materiel'){
		$bureau=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel Mobilier de bureau')));
		$informatique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel informatique')));
		$medicoHospitalier=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel medicoHospitalier')));
		$medicoTechnique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel medicoTechnique')));
		$exploitation=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>"Matériel d'exploitation")));
		$this->set('title_for_layout',"Liste du Matériel");
	}
	else if($this->Session->read('typearticle')=='fourniture'){
		$fbureau=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Fourniture de bureau')));
		$finformatique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Fourniture informatique')));
		$this->set('title_for_layout',"Liste du Fourniture");
	}
	else if($this->Session->read('typearticle')=='produit'){
		$hygiene=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>"Produits d'hygiène")));
		$this->set('title_for_layout',"Liste des Produits d'hygiène");
	}
	else if($this->Session->read('typearticle')=='e'){
		$bureau=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel Mobilier de bureau','datef >='=>date('Y-m-d'))));
		$informatique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel informatique','datef >='=>date('Y-m-d'))));
		$medicoHospitalier=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel medicoHospitalier','datef >='=>date('Y-m-d'))));
		$medicoTechnique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel medicoTechnique','datef >='=>date('Y-m-d'))));
		$exploitation=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>"Matériel d'exploitation",'datef >='=>date('Y-m-d'))));
		$fbureau=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Fourniture de bureau','datef >='=>date('Y-m-d'))));
		$finformatique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Fourniture informatique','datef >='=>date('Y-m-d'))));
		$hygiene=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>"Produits d'hygiène",'datef >='=>date('Y-m-d'))));
	}
	else if($this->Session->read('typearticle')=='z'){
		$bureau=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel Mobilier de bureau','qte <= 0')));
		$informatique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel informatique','qte <= 0')));
		$medicoHospitalier=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel medicoHospitalier','qte <= 0')));
		$medicoTechnique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel medicoTechnique','qte <= 0')));
		$exploitation=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>"Matériel d'exploitation",'qte <= 0')));
		$fbureau=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Fourniture de bureau','qte <= 0')));
		$finformatique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Fourniture informatique','qte <= 0')));
		$hygiene=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>"Produits d'hygiène",'qte <= 0')));
		$this->set('title_for_layout',"Liste du Matériel avec quantité = 0");
	}
	else if($this->Session->read('typearticle')=='nz'){
		$bureau=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel Mobilier de bureau','qte > 0')));
		$informatique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel informatique','qte > 0')));
		$medicoHospitalier=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel medicoHospitalier','qte > 0')));
		$medicoTechnique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel medicoTechnique','qte > 0')));
		$exploitation=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>"Matériel d'exploitation",'qte > 0')));
		$fbureau=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Fourniture de bureau','qte > 0')));
		$finformatique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Fourniture informatique','qte > 0')));
		$hygiene=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>"Produits d'hygiène",'qte > 0')));
		$this->set('title_for_layout',"Liste du Matériel avec quantité > 0");
	}
	else if($this->Session->read('typearticle')=='min'){
		$bureau=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel Mobilier de bureau','qte <= min')));
		$informatique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel informatique','qte <= min')));
		$medicoHospitalier=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel medicoHospitalier','qte <= min')));
		$medicoTechnique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel medicoTechnique','qte <= min')));
		$exploitation=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>"Matériel d'exploitation",'qte <= min')));
		$fbureau=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Fourniture de bureau','qte <= min')));
		$finformatique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Fourniture informatique','qte <= min')));
		$hygiene=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>"Produits d'hygiène",'qte <= min')));
	}
	else if($this->Session->read('typearticle')=='max'){
		
		$bureau=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel Mobilier de bureau','qte <= max')));
		$informatique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel informatique','qte <= max')));
		$medicoHospitalier=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel medicoHospitalier','qte <= max')));
		$medicoTechnique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel medicoTechnique','qte <= max')));
		$exploitation=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>"Matériel d'exploitation",'qte <= max')));
		$fbureau=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Fourniture de bureau','qte <= max')));
		$finformatique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Fourniture informatique','qte <= max')));
		$hygiene=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>"Produits d'hygiène",'qte <= max')));
	}
	else if($this->Session->read('typearticle')=='cat'){
		$this->set('title_for_layout',$this->Session->read('typearticless'));
		$data=$this->Session->read('typearticles');
		
		$bureau=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel Mobilier de bureau','piece_id ='.$data)));
		$informatique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel informatique','piece_id ='.$data)));
		$medicoHospitalier=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel medicoHospitalier','piece_id ='.$data)));
		$medicoTechnique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel medicoTechnique','piece_id ='.$data)));
		$exploitation=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>"Matériel d'exploitation",'piece_id ='.$data)));
		$fbureau=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Fourniture de bureau','piece_id ='.$data)));
		$finformatique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Fourniture informatique','piece_id ='.$data)));
		$hygiene=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>"Produits d'hygiène")));
		}
	else{
		$bureau=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel Mobilier de bureau')));
		$informatique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel informatique')));
		$medicoHospitalier=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel medicoHospitalier')));
		$medicoTechnique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Matériel medicoTechnique')));
		$exploitation=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>"Matériel d'exploitation")));
		$fbureau=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Fourniture de bureau')));
		$finformatique=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>'Fourniture informatique')));
		$hygiene=$this->Materiel->find('all',array('conditions'=>array('typemateriel'=>"Produits d'hygiène")));
            }
		$this->set(compact('bureau','informatique','medicoHospitalier','medicoTechnique','exploitation','fbureau','finformatique','hygiene'));
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer liste";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Articles (stock)";
				$this->request->data['Evennement']['logicielar']="البضائع";
				$this->request->data['Evennement']['logicielen']="Goods (stock)";
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
						$this->Mpdf->SetHTMLFooter($footer."<font size='1'>Page {PAGENO} de {nb}</font>");
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
	public function magasins(){
			$this->set('current_icon','icons/building.png');
			$this->set('current_controller','materiels/tout');
			$this->set('current_controllername','Stock: classification');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','materiels/magasins');
			$this->set('current_iconviewname','Magasins');
			$this->set('title_for_layout',"Magasins");
	$this->layout = 'admin';
	$options=$this->Piece->find('all', array('fields'=> array('Piece.id', 'Piece.nom')));
	$this->set(compact('options'));
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/magasins');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/magasins');
		}
	
	}
	public function categories($id=null,$titre=null){
		$this->Session->write('typearticle','cat');
		if($id){
			$this->Session->write('typearticles',$id);
			$this->Session->write('typearticless',$titre);
		}
			$this->redirect(array('action'=>'admin'));
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/categories');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/categories');
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
	public function t($id=null){
		$this->Session->write('typearticle','t');
		$this->redirect(array('action'=>'admin'));
	}
	public function e($id=null){
		$this->Session->write('typearticle','e');
		$this->redirect(array('action'=>'admin'));
	}
	public function tout($id=null){
		$this->Session->write('typearticle','tout');
		$this->redirect(array('action'=>'admin'));
	}
	public function materiel($id=null){
		$this->Session->write('typearticle','materiel');
		$this->redirect(array('action'=>'admin'));
	}
	public function fourniture($id=null){
		$this->Session->write('typearticle','fourniture');
		$this->redirect(array('action'=>'admin'));
	}
	public function produit($id=null){
		$this->Session->write('typearticle','produit');
		$this->redirect(array('action'=>'admin'));
	}
	public function z($id=null){
		$this->Session->write('typearticle','z');
		$this->redirect(array('action'=>'admin'));
	}
	public function nz($id=null){
		$this->Session->write('typearticle','nz');
		$this->redirect(array('action'=>'admin'));
	}
	public function min($id=null){
		$this->Session->write('typearticle','min');
		$this->redirect(array('action'=>'admin'));
	}
	public function max($id=null){
		$this->Session->write('typearticle','max');
		$this->redirect(array('action'=>'admin'));
	}
	public function pieces($id=null){
		$this->Session->write('pieceheader','stock');
		$this->redirect(array('controller'=>'pieces','action'=>('admin')));
	}
	public function imputationsheader($id=null){
		$this->Session->write('stockheader','stock');
		$this->redirect(array('controller'=>'stockcategories','action'=>('imputations')));
	}
	public function marquesheader($id=null){
		$this->Session->write('stockheader','stock');
		$this->redirect(array('controller'=>'stockcategories','action'=>('marques')));
	}
	public function famillesheader($id=null){
		$this->Session->write('stockheader','stock');
		$this->redirect(array('controller'=>'stockcategories','action'=>('familles')));
	}
	public function view($id=null,$titre=null){
	$this->layout = 'admin';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		if(!$titre){
		$this->redirect(array('action'=>'../'));
		}
		$post=$this->Materiel->findById($id);
		if($post){
		$titredetest=$post['Materiel']['nom'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Materiel->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Materiel->findById($id);
			if($post){
				$this->set('current_icon','icons/building.png');
				$this->set('current_controller','materiels/tout');
				$this->set('current_controllername','Stock: articles');
				$this->set('current_iconview','icons/afficher.png');
				$this->set('current_view','materiels/view/'.$id."/".$titre);
				$this->set('current_iconviewname',"FICHE D'ARTICLE: ".$post['Materiel']['nom']);
				$this->set('title_for_layout',"FICHE D'ARTICLE: ".$post['Materiel']['nom']);
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
				$this->set('current_icon','icons/building.png');
				$this->set('current_controller','materiels/tout');
				$this->set('current_controllername','Stock: articles');
				$this->set('current_iconview','icons/ajouter.png');
				$this->set('current_view','materiels/add');
				$this->set('current_iconviewname',"Ajouter un article");
				$this->set('title_for_layout',"Ajouter un article");
	$this->layout = 'admin';
	
	$options = $this->Piece->find('list', array('fields'=> array('Piece.id', 'Piece.nom')));
	$optionsfo = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('type="fournisseur"'),'order'=>array('Client.nom'=>'asc')));
	$optionsc = $this->Commande->find('list', array('fields'=> array('Commande.id', 'Commande.nom')));
	$optionsi = $this->Stockcategorie->find('list', array('fields'=> array('Stockcategorie.id', 'Stockcategorie.nom'),'conditions'=>array('type="imputation"')));
	$optionsm = $this->Stockcategorie->find('list', array('fields'=> array('Stockcategorie.id', 'Stockcategorie.nom'),'conditions'=>array('type="marque"')));
	$optionsfa = $this->Stockcategorie->find('list', array('fields'=> array('Stockcategorie.id', 'Stockcategorie.nom'),'conditions'=>array('type="famille"')));
	$optionsfb = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('type="fabricant"')));
	$this->set(compact('options','optionsfo','optionsc','optionsi','optionsm','optionsfa','optionsfb'));
		if($this->request->is('Post')){
		
			$this->Materiel->create();
			
			$employe=$this->Piece->findById($this->request->data['Materiel']['piece_id']);
			$this->request->data['Materiel']['piece_nom'] = $employe['Piece']['nom'];
			$this->request->data['Materiel']['cout']=$this->request->data['Materiel']['qte']*$this->request->data['Materiel']['prix'];
			/*$employe=$this->Client->findById($this->request->data['Materiel']['fournisseur_id']);
			$this->request->data['Materiel']['fournisseur_nom'] = $employe['Client']['nom'];
			
			$employe=$this->Client->findById($this->request->data['Materiel']['fabricant_id']);
			$this->request->data['Materiel']['fabricant_nom'] = $employe['Client']['nom'];
			
			$employe=$this->Commande->findById($this->request->data['Materiel']['commande_id']);
			$this->request->data['Materiel']['commande_nom'] = $employe['Commande']['nom'];
			
			$employe=$this->Stockcategorie->findById($this->request->data['Materiel']['imputation_id']);
			$this->request->data['Materiel']['imputation_nom'] = $employe['Stockcategorie']['nom'];
			
			$employe=$this->Stockcategorie->findById($this->request->data['Materiel']['marque_id']);
			$this->request->data['Materiel']['marque_nom'] = $employe['Stockcategorie']['nom'];
			
			$employe=$this->Stockcategorie->findById($this->request->data['Materiel']['famille_id']);
			$this->request->data['Materiel']['famille_nom'] = $employe['Stockcategorie']['nom'];
			*/
			if($this->request->data['Materiel']['typemateriel']=="")
                            $this->request->data['Materiel']['type']="";
			
			$this->request->data['Materiel']['user_id'] = $this->Auth->User('id');
			if($this->Materiel->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Articles (stock)";
				$this->request->data['Evennement']['logicielar']="البضائع";
				$this->request->data['Evennement']['logicielen']="Goods (stock)";
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
		if($this->Materiel->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Articles (stock)";
				$this->request->data['Evennement']['logicielar']="البضائع";
				$this->request->data['Evennement']['logicielen']="Goods (stock)";
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
				$this->set('current_icon','icons/building.png');
				$this->set('current_controller','materiels/tout');
				$this->set('current_controllername','Stock: articles');
				$this->set('current_iconview','icons/modifier.png');
				$this->set('current_view','materiels/modifier/'.$id);
				$this->set('current_iconviewname',"Modification d'un article");
				$this->set('title_for_layout',"Modification d'un article");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Materiel->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalid\'article'));
		$this->Materiel->id=$id;
		
	$options = $this->Piece->find('list', array('fields'=> array('Piece.id', 'Piece.nom')));
	$optionsfo = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('type="fournisseur"')));
	$optionsc = $this->Commande->find('list', array('fields'=> array('Commande.id', 'Commande.nom')));
	$optionsi = $this->Stockcategorie->find('list', array('fields'=> array('Stockcategorie.id', 'Stockcategorie.nom'),'conditions'=>array('type="imputation"')));
	$optionsm = $this->Stockcategorie->find('list', array('fields'=> array('Stockcategorie.id', 'Stockcategorie.nom'),'conditions'=>array('type="marque"')));
	$optionsfa = $this->Stockcategorie->find('list', array('fields'=> array('Stockcategorie.id', 'Stockcategorie.nom'),'conditions'=>array('type="famille"')));
	$optionsfb = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('type="fabricant"')));
	$this->set(compact('options','optionsfo','optionsc','optionsi','optionsm','optionsfa','optionsfb'));
		
		if(!$this->request->data)
			$this->request->data=$post;
		else{
		
			$employe=$this->Piece->findById($this->request->data['Materiel']['piece_id']);
			$this->request->data['Materiel']['piece_nom'] = $employe['Piece']['nom'];
			$this->request->data['Materiel']['cout']=$this->request->data['Materiel']['qte']*$this->request->data['Materiel']['prix'];
			/*$employe=$this->Client->findById($this->request->data['Materiel']['fournisseur_id']);
			$this->request->data['Materiel']['fournisseur_nom'] = $employe['Client']['nom'];
			
			$employe=$this->Client->findById($this->request->data['Materiel']['fabricant_id']);
			$this->request->data['Materiel']['fabricant_nom'] = $employe['Client']['nom'];
			
			$employe=$this->Commande->findById($this->request->data['Materiel']['commande_id']);
			$this->request->data['Materiel']['commande_nom'] = $employe['Commande']['nom'];
			
			$employe=$this->Stockcategorie->findById($this->request->data['Materiel']['imputation_id']);
			$this->request->data['Materiel']['imputation_nom'] = $employe['Stockcategorie']['nom'];
			
			$employe=$this->Stockcategorie->findById($this->request->data['Materiel']['marque_id']);
			$this->request->data['Materiel']['marque_nom'] = $employe['Stockcategorie']['nom'];
			
			$employe=$this->Stockcategorie->findById($this->request->data['Materiel']['famille_id']);
			$this->request->data['Materiel']['famille_nom'] = $employe['Stockcategorie']['nom'];*/
		if($this->Materiel->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Articles (stock)";
				$this->request->data['Evennement']['logicielar']="البضائع";
				$this->request->data['Evennement']['logicielen']="Goods (stock)";
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
				$this->set('current_icon','icons/building.png');
				$this->set('current_controller','materiels/tout');
				$this->set('current_controllername','Stock: articles');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','materiels/recherche');
				$this->set('current_iconviewname',"Recherche d'articles");
				$this->set('title_for_layout',"Recherche d'articles");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '3')
				$realisation=$this->Materiel->find('all',array('conditions'=>array('Materiel.id='.$this->request->data['Materiel']['ide'])));
			else if($_POST['rechercher'] == '2'){
			/*$dated=$this->request->data['Materiel']['dated']['year']."-".$this->request->data['Materiel']['dated']['month']."-".$this->request->data['Materiel']['dated']['day'];
			$datef=$this->request->data['Materiel']['datef']['year']."-".$this->request->data['Materiel']['datef']['month']."-".$this->request->data['Materiel']['datef']['day'];
			
			$conditions = array('Materiel.date <=' => $datef, 'Materiel.date >=' => $dated);*/
			$des=$this->request->data['Materiel']['des'];
			$realisation=$this->Materiel->find('all',array('conditions'=>array('OR' => array('Materiel.nom LIKE' => "%$des%"))));
				//$realisation=$this->Materiel->find('all',array('conditions'=>array('Materiel.jusqua BETWEEN '.$dated.' AND '.$datef)));
				//$this->User->find('all', array('conditions' => array('User.reg_date BETWEEN '.$start_date.' AND DATE_ADD('.$start_date.', INTERVAL 30 DAY)')));
			}
			else if($_POST['rechercher'] == '1')
				$realisation=$this->Materiel->find('all',array('conditions'=>array('Materiel.ref="'.$this->request->data['Materiel']['serie'].'"')));
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
		$post=$this->Materiel->findById($id);
		if($post){
			//$post=$this->Materiel->findById($id);
			if($post){
				$this->set('title_for_layout',"FICHE D'ARTICLE DU STOCK");
				$this->set('post',$post);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Articles (stock)";
				$this->request->data['Evennement']['logicielar']="البضائع";
				$this->request->data['Evennement']['logicielen']="Goods (stock)";
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
						$this->Mpdf->SetHTMLFooter($footer."<font size='1'>Page {PAGENO} de {nb}</font>");
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
