<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('appModel', 'Model');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
public $components = array('Session','Auth'=>array('authorize' => array('Controller'),'loginRedirect'=>array('controller'=>'users','action'=>'accueil'),'logoutRedirect'=>array('controller'=>'pages','display'=>'home')),'Paginator','RequestHandler','Mpdf.Mpdf');
//public $paginate = array('limit' => 2);
public $uses = array('Consultation','Configuration');
public $addmessage, $editmessage, $delmessage, $notfoundmessage, $authmessage, $statutmessage1, $statutmessage2, $errormessage, $sendmessage, $qtemessage, $qtemaxmessage, $okmessage, $okusermessage;
//public $components = array('RequestHandler');
	
public function beforeFilter(){
$this->Auth->allow('nouvelledemande','login','consultation','enregistrer','activation','display','presentation','voir','archive','en','fr','ar');
$this->Session->write('lang','fr');
if($this->Session->read('lang')=='ar'){
	$this->addmessage="تمت الإضافة بنجاح";
	$this->editmessage="تم التعديل بنجاح";
	$this->delmessage="تمت الإزالة بنجاح";
	$this->notfoundmessage="الصفحة غير موجودة";
	$this->authmessage="المعذرة, ليس لديك التصريح بالقيام بهذه العملية";
	$this->errormessage="المعذرة, لقد حدث خطأ ما";
	$this->statutmessage1='<p style="text-align:center;color:#fff">لمزيد من المعلومات <a href="/statuts/view" >أنقر هنا</a><br> لقد تم تحديث حالة النظام الخاص بك</p>';
	$this->statutmessage2='هناك مشكلة في حالة النظام الخاص بك <br> المرجوا الاتصال بنا لمزيد من المعلومات';
	$this->sendmessage="تم الإرسال بنجاح";
	$this->qtemessage="خطأ: الكمية الطلوبة غير متوفرة في المخزون";
	$this->qtemaxmessage="خطأ: لقد تجاوزت الحد الأقصى للتخزين لهذه البضاعة";
	$this->okmessage="تم التنفيذ بنجاح";
	$this->okusermessage="تم إنشاء حسابك بنجاح";
}
else if($this->Session->read('lang')=='en'){
	$this->addmessage="Added successfully";
	$this->editmessage="Modified successfully";
	$this->delmessage="Removed successfully";
	$this->notfoundmessage="Page not found";
	$this->authmessage="Sorry, you do not have permission to perform this operation";
	$this->errormessage="Sorry, an error has occurred";
	$this->statutmessage1='<p style="text-align:center;color:#fff">The status of your system updated<br><a href="/statuts/view" >Click here</a> for details</p>';
	$this->statutmessage2='There a problem with the status of your system<br>Contact us for more informations';
	$this->sendmessage="Sent successfully";
	$this->qtemessage="Error: The quantity requested is not available in the stock";
	$this->qtemaxmessage="You have exceeded the Maximum stock for this article";
	$this->okmessage="Implemented successfully";
	$this->okusermessage="Your account has been successfully created";
}
else{
	$this->addmessage="Ajout avec succès";
	$this->editmessage="Modifiée avec succès";
	$this->delmessage="Supprimé avec succès";
	$this->notfoundmessage="Page non trouvée";
	$this->errormessage="Désolé, vous avez une erreur";
	$this->authmessage="Désolé, vous n'avez pas la permission d'effectuer cette opération";
	$this->statutmessage1='<p style="text-align:center;color:#fff">Le statut de votre système à été mise à jour<br><a href="/statuts/view" >Cliquez ici</a> pour plus de détails</p>';
	$this->statutmessage2='Il y à un problème avec la statut de votre système!<br>contactez nous pour plus d\'informations';
	$this->sendmessage="Envoyé avec succès";
	$this->qtemessage="Erreur: La quantité demandé n'est pas disponible dans le stock";
	$this->qtemaxmessage="Erreur: Vous avez dépassé le Maximum stock pour cet article";
	$this->okmessage="Mis en œuvre avec succès";
	$this->okusermessage="Votre compte a été créé avec succès";
}

$userheader = $this->Auth->user();
$this->Session->write('ref','ref2');
if($this->Session->read('Auth.User.id')){
	if ($this->Session->read('Auth.User.ref')!="ref2")
		$this->Auth->logout();
}

$config=$this->Configuration->find('first');
$this->set(compact('config','userheader'));
if($this->Session->read('type')!='site' && $this->Session->read('type')!='entreprise')
	$this->Session->write('type','accueil');
/*$name=md5(time());
$params = array(
		'download' => false,
		'name' => $name.".pdf",
		'paperOrientation' => 'portrait',
		'paperSize' => 'legal'
		);
		$this->set($params);*/
$ref=$this->Session->read('ref');
/*$post=$this->Statut->find('first',array('conditions'=>array('Statut.ref ='=>$ref,'Statut.etat'=>'1')));
		//$lien=$this->Html->url('/');
if($post){
	if($post['Statut']['etat']=='1')
		$this->Session->setFlash($this->statutmessage1, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
	if($post['Statut']['fermer']=='1'){
		$this->Session->setFlash($this->statutmessage2);
		$this->Auth->logout();
		}
	}*/
}

public function isAuthorized($user){
		if(isset($user['role']) && $user['role']==='admin')
			return true;

		if (in_array($this->action,array('index','add','admin','view','recherche','imprimer','imprimerliste','triasc','tridesc','tous','admins','employes','clients','actives','inactives','nonlu','lu','mauvais','moyenne','bien','excellent','cin','contrats','imprimerlisteprojets','fournisseurs','fabricants','societem','societea','societel','ae','ar','tout','br','pb','contratg','contratm','contrata','contratl','e','t','categories','cats','s','a','r','reglee','nonreglee','pieces','marquesheader','famillesheader','marques','familles','contratg','contratm','contrata','contratl','localisations','fournisseurs','imputationsheader','lier','projets','entree','sortie','journale','entreeliste','sortieliste','imputations','depenses','recettes','materiel','fourniture','produit','','','','','','')) && isset($user['role']) && $user['role']==='moderateur')
			return true;
		if (in_array($this->action,array('logout')))
			return true;
		return false;
}

//debugkit include :)
//public $components = array('DebugKit.Toolbar');
}

/*App::uses('MxValidation', 'Localized.Validation');
class Post extends appModel {

    public $validate = array(
        'postal' => array(
            'valid' => array(
                'rule' => array('postal', null, 'mx'),
                'message' => 'Must be valid mexico postal code'
            )
        )
    );
}
*/
?>