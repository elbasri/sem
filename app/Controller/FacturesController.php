<?php
App::uses('AppController', 'Controller');

class FacturesController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Facture','Client','Commande','Item','Materiel','Produit','Service','Evennement','Stockaction');
	public $paginate= array('limit'=>'10','order'=>array('Facture.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Facture.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Factures']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Facture->isOwnedBy($postId,$user['id']))
				return true;
			else if($user['role']!=='admin')
				$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		}
		return parent::isAuthorized($user);
	}
	
	//public function test(){}
	public function admin(){
	$this->set('title_for_layout',"Gestion des factures");
	$this->layout = 'admin';
		$this->Paginator->settings=$this->paginate;
	if($this->Session->read('tri')=='desc')
		$this->Paginator->settings=$this->paginatedesc;
		
	if($this->Session->read('typefacture')=='reglee'){
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','factures/tout');
			$this->set('current_controllername','Gestion commerciale: Factures/Bons');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','factures/reglee');
			$this->set('current_iconviewname',"Factures/Bon réglées");
			$this->set('title_for_layout',"Factures/Bon réglées");
		$post=$this->Paginator->paginate('Facture',array('etat'=>'Réglée'));
		}
	else if($this->Session->read('typefacture')=='nonreglee'){
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','factures/tout');
			$this->set('current_controllername','Gestion commerciale: Factures/Bonss');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','factures/nonreglee');
			$this->set('current_iconviewname',"Factures/Bon non réglées");
			$this->set('title_for_layout',"Factures/Bon non réglées");
		$post=$this->Paginator->paginate('Facture',array('etat'=>'Non réglée'));
		}
	else if($this->Session->read('typefacture')=='factureventes'){
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','factures/tout');
			$this->set('current_controllername','Gestion commerciale: Factures/Bons');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','factures/factureventes');
			$this->set('current_iconviewname',"Factures des clients (ventes)");
			$this->set('title_for_layout',"Factures des clients (ventes)");
		$post=$this->Paginator->paginate('Facture',array('type'=>'Facture','venteachat'=>'Ventes'));
		}
	else if($this->Session->read('typefacture')=='bonventes'){
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','factures/tout');
			$this->set('current_controllername','Gestion commerciale: Factures/Bons');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','factures/bonventes');
			$this->set('current_iconviewname',"Bons de livraisonn");
			$this->set('title_for_layout',"Bons de livraison");
		$post=$this->Paginator->paginate('Facture',array('type'=>'Bon de livraison'));
		}
	else if($this->Session->read('typefacture')=='factureachats'){
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','factures/tout');
			$this->set('current_controllername','Gestion commerciale: Factures/Bons');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','factures/factureachats');
			$this->set('current_iconviewname',"Factures des sociétés (Achats)");
			$this->set('title_for_layout',"Factures des sociétés (Achats)");
		$post=$this->Paginator->paginate('Facture',array('type'=>'Facture','venteachat'=>'Achats'));
		}
	else if($this->Session->read('typefacture')=='bonachats'){
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','factures/tout');
			$this->set('current_controllername','Gestion commerciale: Factures/Bons');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','factures/bonachats');
			$this->set('current_iconviewname',"Bons de réception");
			$this->set('title_for_layout',"Bons de réception");
		$post=$this->Paginator->paginate('Facture',array('type'=>'Bon de réception'));
		}
	else{
			$this->set('current_icon','icons/basket.png');
			$this->set('current_controller','factures/tout');
			$this->set('current_controllername','Gestion commerciale: Factures/Bons');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','factures/admin');
			$this->set('current_iconviewname',"Administration");
			$this->set('title_for_layout',"Administration");
		$post=$this->Paginator->paginate('Facture');
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
		$post=$this->Facture->findById($id);
		if($post){
		$titredetest=$post['Facture']['nom'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Facture->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Facture->findById($id);
			//$client=$this->Client->findById($post['Facture']['client_id']);
			$items=$this->Item->find('all',array('conditions'=>array('id_op'=>$id)));
			$this->set(compact('items'));
			if($post){
				if($post['Facture']['type']=="Bon de livraison"){
						$this->set('current_icon','icons/basket.png');
						$this->set('current_controller','factures/tout');
						$this->set('current_controllername','Gestion commerciale: Factures/Bons');
						$this->set('current_iconview','icons/afficher.png');
						$this->set('current_view','factures/view/'.$id."/".$titre);
						$this->set('current_iconviewname',"Bon de livraison: ".$post['Facture']['nom']);
						$this->set('title_for_layout',"Bon de livraison: ".$post['Facture']['nom']);
					}
				else{
						$this->set('current_icon','icons/basket.png');
						$this->set('current_controller','factures/tout');
						$this->set('current_controllername','Gestion commerciale: Factures/Bons');
						$this->set('current_iconview','icons/afficher.png');
						$this->set('current_view','factures/view/'.$id."/".$titre);
						$this->set('current_iconviewname',"Facture: ".$post['Facture']['nom']);
						$this->set('title_for_layout',"Facture: ".$post['Facture']['nom']);
						
					}
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
	public function add($id=null){
	if($this->Session->read('Auth.User.add')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	if(!$id){
			$this->redirect(array('action'=>'admin'));
		}	
				$this->set('current_icon','icons/basket.png');
				$this->set('current_controller','factures/tout');
				$this->set('current_controllername','Gestion commerciale: Factures/Bons');
				$this->set('current_iconview','icons/ajouter.png');
				$this->set('current_view','factures/add');
				$this->set('current_iconviewname',"Ajouter une Facture/Bon");
				$this->set('title_for_layout',"Ajouter une Facture/Bon");

	$this->layout = 'admin';
	/*$options = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('Client.type = "client"')));
	$optionsf = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('Client.type <> "client"')));
	$optionsc = $this->Commande->find('list', array('fields'=> array('Commande.id', 'Commande.nom')));
	$stock = $this->Materiel->find('list', array('fields'=> array('Materiel.id', 'Materiel.nom')));
	$produit = $this->Produit->find('list', array('fields'=> array('Produit.id', 'Produit.titre')));
	$service = $this->Service->find('list', array('fields'=> array('Service.id', 'Service.titre')));*/
	$bons = $this->Facture->find('list', array('fields'=> array('Facture.id', 'Facture.nom'),'order'=>array('Facture.id'=>'desc')));
	$this->set(compact('bons'));
        if($this->request->is('Post')){
        $post=$this->Stockaction->findById($id);
            if($post){
                if($post['Stockaction']['bon_id']!=null){
                        $titre=Inflector::slug($post['Stockaction']['bon_nom'],$replacement ='_');
                        return $this->redirect(array('action'=>'view'.'/'.$post['Stockaction']['bon_id'].'/'.$titre));
                }
            
            if($this->request->data['Facture']['type']==0){
                    $this->request->data['Facture']['client_id'] = $post['Stockaction']['client_id'];
                    $this->request->data['Facture']['client_nom'] = $post['Stockaction']['client_nom'];
                    if($post['Stockaction']['nom']=="sortie")
                        $this->request->data['Facture']['type']="Bon de livraison";
                    else
                        $this->request->data['Facture']['type']="Bon de réception";
                    $this->request->data['Facture']['nom'] = $post['Stockaction']['client_nom']. " - " .$post['Stockaction']['id'];
                    $this->request->data['Facture']['user_id'] = $this->Auth->User('id');
                    
                    $factureexist=$this->Facture->find('first',array('conditions'=>array('nom'=>$this->request->data['Facture']['nom'])));
                    if(!$factureexist){
                            $this->Facture->create();
                            $this->Facture->save($this->request->data);
                            $id=$this->Facture->id;
                        }
                        else
                            $id=$factureexist['Facture']['id'];
                    }
                    else
                    $id=$this->request->data['Facture']['bon'];
                                 
                             $items=$this->Item->find('first',array('conditions'=>array('id_op'=>$id,'idaction'=>$post['Stockaction']['id'])));
                             if(!$items){
                                    $this->Item->create();
                                    $this->request->data['Item']['type']="facture";
                                if($post['Stockaction']['ref']!=null)
                                    $this->request->data['Item']['ref']=$post['Stockaction']['ref'];
                                    
                                    $this->request->data['Item']['id_op']=$id;
                                    $this->request->data['Item']['idaction']=$post['Stockaction']['id'];
                                    $this->request->data['Item']['qte']=$post['Stockaction']['qte'];
                                     $this->request->data['Item']['typevaleur']=$post['Stockaction']['typevaleur'];
                                    $this->request->data['Item']['desc']=$post['Stockaction']['materiel_nom'];
                                    $this->request->data['Item']['date']=$post['Stockaction']['date'];
                                    $this->Item->save($this->request->data);
                                    }
                                    $this->Evennement->create();
                                    $this->request->data['Evennement']['titre']="Ajouter";
                                    $this->request->data['Evennement']['titrear']="إضافة";
                                    $this->request->data['Evennement']['titreen']="Add";
                                    $this->request->data['Evennement']['logiciel']="Factures";
                                    $this->request->data['Evennement']['logicielar']="فواتير";
                                    $this->request->data['Evennement']['logicielen']="Invoices";
                                    $this->request->data['Evennement']['user']=$this->Auth->User('username');
                                    $this->request->data['Evennement']['iduser']=$this->Auth->User('id');
                                    $this->Evennement->save($this->request->data);
                                    
                                    
                                    
                                        $this->Stockaction->id=$post['Stockaction']['id'];
                                        
                                        $post=$this->Facture->findById($id);
                                        $titre=Inflector::slug($post['Facture']['nom'],$replacement ='_');
                                        
                                        $this->Stockaction->saveField('bon_id',$id);
                                        $this->Stockaction->saveField('bon_nom',$post['Facture']['nom']);
                                        
                                    return $this->redirect(array('action'=>'view'.'/'.$id.'/'.$titre));
            
            }
	}
	//return $this->redirect(array('action'=>'admin'));
		
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
		if($this->Facture->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Factures";
				$this->request->data['Evennement']['logicielar']="فواتير";
				$this->request->data['Evennement']['logicielen']="Invoices";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
			$this->Session->setFlash($this->delmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
			return $this->redirect(array('action'=>'admin'));
		}
	}
	public function modifier($op=null,$type=null,$fac=null){
	if($this->Session->read('Auth.User.edit')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	if(!$op or !$type or !$fac)
			$this->redirect(array('action'=>'admin'));
        $this->set(compact('type'));
            
				$this->set('current_icon','icons/basket.png');
				$this->set('current_controller','factures/tout');
				$this->set('current_controllername','Gestion commerciale: Factures/Bons');
				$this->set('current_iconview','icons/modifier.png');
				$this->set('current_view','factures/modifier/'.$op."/".$type);
                        if($type=="s"){
                            $this->set('current_iconviewname',"Suppression d'une ligne d'une Facture/Bons");
                            $this->set('title_for_layout',"Suppression d'une ligne d'une Facture/Bons");
                        }else{
                            $this->set('current_iconviewname',"Modification d'une Facture/Bons");
                            $this->set('title_for_layout',"Modification d'une Facture/Bons");
                        }
				
	$this->layout = 'admin';
	$bons = $this->Facture->find('list', array('fields'=> array('Facture.id', 'Facture.nom')));
	$this->set(compact('bons','fac'));
        if($this->request->is('Post')){
	$id=$this->request->data['Facture']['bon'];
            $facture=$this->Facture->findById($id);
            if(!$facture)
                    throw new NotFoundException(_('Invalide bon'));
		
        
            if($type=="s"){
                $items=$this->Item->find('first',array('conditions'=>array('id_op'=>$id,'idaction'=>$op)));
                if($items){
                    $this->Stockaction->id=$op;
                    $this->Stockaction->saveField('bon_id',null);
                    $this->Stockaction->saveField('bon_nom',null);
                    
                    $this->Item->delete($items['Item']['id']);
                }
                $titre=Inflector::slug($facture['Facture']['nom'],$replacement ='_');
                return $this->redirect(array('action'=>'view'.'/'.$facture['Facture']['id'].'/'.$titre));
            }
            else if($type=="e"){
            $this->set('current_iconviewname',"Modification d'une Facture/Bons");
            $this->set('title_for_layout',"Modification d'une Facture/Bons");
		$this->Facture->id=$id;
                $this->Facture->saveField('infos',$this->request->data['Facture']['infos']);
                $titre=Inflector::slug($facture['Facture']['nom'],$replacement ='_');
                return $this->redirect(array('action'=>'view'.'/'.$facture['Facture']['id'].'/'.$titre));
                }
                return $this->redirect(array('action'=>'admin'));
          }

	}
	public function recherche(){
	if($this->Session->read('Auth.User.recherche')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
		
				$this->set('current_icon','icons/basket.png');
				$this->set('current_controller','factures/tout');
				$this->set('current_controllername','Gestion commerciale: Factures/Bons');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','factures/recherche');
				$this->set('current_iconviewname',"Recherche de Factures/Bons");
				$this->set('title_for_layout',"Recherche de Factures/Bons");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '2')
				$realisation=$this->Facture->find('all',array('conditions'=>array('Facture.montant='.$this->request->data['Facture']['mont'])));
			else if($_POST['rechercher'] == '1'){
				$cle=$this->request->data['Facture']['nom1'];
				$realisation=$this->Facture->find('all',array('conditions'=>array('OR' => array('Facture.nom LIKE' => "%$cle%"))));
				}
			else if($_POST['rechercher'] == '3'){
				$realisation=$this->Facture->find('all',array('conditions'=>array('Facture.reference="'.$this->request->data['Facture']['ref'].'"')));
				}
			else if($_POST['rechercher'] == '4'){
				$realisation=$this->Facture->find('all',array('conditions'=>array('Facture.etat="'.$this->request->data['Facture']['et'].'"')));
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
		$post=$this->Facture->findById($id);
		if($post){
			//$post=$this->Facture->findById($id);
			//$client=$this->Client->findById($post['Facture']['client_id']);
			//$type=$post['Facture']['type'];
			//$ref=$post['Facture']['reference'];
			$items=$this->Item->find('all',array('conditions'=>array('id_op'=>$id)));
			$this->set(compact('items'));;
			if($post){
				if($post['Facture']['type']=="Bon de livraison")
					$this->set('title_for_layout',"Bon de livraison");
				else
					$this->set('title_for_layout',"Facture");
				$this->set('post',$post);
				$distination=$post['Facture']['client_nom'];
				$this->set('distination',$distination);
				$this->set('topdate',1);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Factures";
				$this->request->data['Evennement']['logicielar']="فواتير";
				$this->request->data['Evennement']['logicielen']="Invoices";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				$footersign=1;
				$this->set('footersign',$footersign);
				if($pdf=="pdf"){
						$name=$this->request->params['controller']."_".md5(time());
						$this->layout = 'imprimerpdf';
						
						$this->Mpdf->init();
						$this->Mpdf->setAutoTopMargin = 'stretch';
						$this->Mpdf->setAutoBottomMargin = 'stretch';
						$view = new View($this, false);
                                                $header = $view->element('imprimerheaderpdf');
                                                $footer = $view->element('imprimerfooter');
						$this->Mpdf->SetHTMLHeader($header);
						//$this->Mpdf->SetHTMLFooter($footer."<font size='1'>Page {PAGENO} de {nb}</font>");
						$this->Mpdf->SetHTMLFooter($footer);
						$this->Mpdf->setFilename($name.'.pdf');
						$this->Mpdf->setOutput('D');
						$this->Mpdf->SetWatermarkText("Draft");
						}
				}
				else
				throw new NotFoundException(_('invalide facture!'));
		}else{
			throw new NotFoundException(_('invalide facture!'));
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
	
	$this->layout = 'imprimer';
	if($this->Session->read('typefacture')=='reglee'){
		$this->set('title_for_layout',"Liste de Factures Réglées");
		$post=$this->Facture->find('all',array('conditions'=>array('etat'=>'Réglée')));
		}
	else if($this->Session->read('typefacture')=='nonreglee'){
		$this->set('title_for_layout',"Liste de Factures Non réglées");
		$post=$this->Facture->find('all',array('conditions'=>array('etat'=>'Non réglée')));
		}
	else if($this->Session->read('typefacture')=='factureventes'){
		$this->set('title_for_layout',"Liste de Factures des clients (ventes)");
		$post=$this->Facture->find('all',array('conditions'=>array('type'=>'Facture','venteachat'=>'Ventes')));
		}
	else if($this->Session->read('typefacture')=='bonventes'){
		$this->set('title_for_layout',"Liste de Bons de livraison");
		$post=$this->Facture->find('all',array('conditions'=>array('type'=>'Bon de livraison')));
		}
	else if($this->Session->read('typefacture')=='factureachats'){
		$this->set('title_for_layout',"Liste de Factures des sociétés (Achats)");
		$post=$this->Facture->find('all',array('conditions'=>array('type'=>'Facture','venteachat'=>'Achats')));
		}
	else if($this->Session->read('typefacture')=='bonachats'){
		$this->set('title_for_layout',"Liste de Bons de réception");
		$post=$this->Facture->find('all',array('conditions'=>array('type'=>'Bon de réception')));
		}
	else{
		$this->set('title_for_layout',"Liste de Factures et bons");
		$post=$this->Facture->find('all');
		}
		$this->set(compact('post'));
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer liste";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Factures";
				$this->request->data['Evennement']['logicielar']="فواتير";
				$this->request->data['Evennement']['logicielen']="Invoices";
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
	public function reglee($id=null){
		$this->Session->write('typefacture','reglee');
		$this->redirect(array('action'=>'admin'));
	}
	public function nonreglee($id=null){
		$this->Session->write('typefacture','nonreglee');
		$this->redirect(array('action'=>'admin'));
	}
	public function tout($id=null){
		$this->Session->write('typefacture','tout');
		$this->redirect(array('action'=>'admin'));
	}
	public function factureventes($id=null){
		$this->Session->write('typefacture','factureventes');
		$this->redirect(array('action'=>'admin'));
	}
	public function bonventes($id=null){
		$this->Session->write('typefacture','bonventes');
		$this->redirect(array('action'=>'admin'));
	}
	public function factureachats($id=null){
		$this->Session->write('typefacture','factureachats');
		$this->redirect(array('action'=>'admin'));
	}
	public function bonachats($id=null){
		$this->Session->write('typefacture','bonachats');
		$this->redirect(array('action'=>'admin'));
	}
} // fin de "appcontroller"
?>
