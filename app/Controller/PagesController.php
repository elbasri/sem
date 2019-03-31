<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {
public $helpers = array('Html', 'Form');
/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Consultation','Service','Produit','Configuration');
	
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */


public function beforeFilter(){
parent::beforeFilter();
$produits=$this->Produit->find('all',array('limit'=>'3','order'=>array('Produit.id'=>'desc')));
$services=$this->Service->find('all',array('limit'=>'3','order'=>array('Service.id'=>'desc')));
$consultationfooter=$this->Consultation->find('all',array('fields'=>array('Consultation.titrear','Consultation.titreen','Consultation.titre','Consultation.id','Consultation.img','Consultation.etat','Consultation.accueil'),'conditions'=>array('etat'=>1,'accueil'=>1)));
$this->set(compact('produits', 'services', 'consultationfooter'));
}

	public function display() {
		$configs=$this->Configuration->find('first',array('fields'=>array('Configuration.titre','Configuration.desc','Configuration.siteweb')));
		$this->set('title_for_layout',$configs['Configuration']['titre']);
		if($configs['Configuration']['siteweb']==0){
			$this->redirect(array('controller'=>'users','action'=>'login'));
		}
		$path = func_get_args();
		//$sliders= $this->Slider->find('all');
		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		//$this->loadModel('Slider');
		//$post=$this->Slider->find('all');
		if(isset($this->params['id']) && isset($this->params['titre'])){
		$post=$this->Consultation->findById($this->params['id']);
		if($post){
		$titredetest=$post['Consultation']['titre'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Consultation->findByTitre($titre);
		if($this->params['titre']==$titredetest){
			//$post=$this->Consultation->findById($this->params['id']);
			if($post){
					if($post['Consultation']['etat']=="1"){
						$this->set('title_for_layout',$post['Consultation']['titre']);
						$this->set('post',$post);
					}
					else{
						$this->Session->setFlash($this->notfoundmessage);
						$this->redirect(array('controller'=>'pages','action'=>'home'));
					}
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
		}
		
			
		$this->set(compact('page', 'subpage'));
		//$this->set(compact('page', 'subpage', 'title_for_layout', 'sliders'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
		
		
	}
	
	public function fr($id=null,$titre=null){
		
		/*if($id){
			if($post){
				$this->set('post',$post);
				}
				else
				throw new NotFoundException($this->notfoundmessage);
		}
		if(!$titre){
		$this->redirect(array('action'=>'/'));
		}
		$post=$this->Consultation->findById($id);
		if($post){
		$titredetest=$post['Consultation']['titre'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Consultation->findByTitre($titre);
		if($titre==$titredetest){
			$post=$this->Consultation->findById($id);
			if($post){
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
			}*/
	}
	
}
?>