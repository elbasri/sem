<?php
class RActionHelper extends Helper{
	var $helpers = array('Html', 'IForm');
	var $default_actions = array();
	var $fields =array();
	var $searchUrl = '/';
	var $idForm='' ;
	
	//recherche 
	function register_search($searchFields=array(),$searchUrl,$modelName="Search"){
			$this->searchUrl=$searchUrl ;
			$this->fields=$searchFields;
			$this->idForm="F".$modelName;
	}
	
	function printSearch(){ 
		$output='<script>
						jQuery(function($) {
							$("#'.$this->idForm.'").submit(function() {
										model =$(this).attr("id");
										model =model.substring(1);
										ajaxLoad($(this).attr("action"),model);
										return false;
								});
						});
		</script>';
		$output=$output.$this->IForm->create('Search',array('url'=>$this->searchUrl,
									'id'=>$this->idForm,
									'class'=>'form label-inline searchForm'));		
		foreach ($this->fields as $field=>$options){
			$output=$output.$this->IForm->input($field,$options) ;	
	    }
		$output=$output.$this->IForm->end_('Filtrer');
		return $output;
	}
	
	
	//Actions 
	function printActions(){
		$View =& ClassRegistry::getObject('view');
		echo $View->element('actions'); 
		$thi->default_actions=array();
	}
	
	function register_default($v = true,$a = true, $e = true, $d= true){
		if($v)  {$this->default_actions[]= $this->Html->image("/images/icons/page_white_text.png")." ".$this->Html->link('Consulter','view');}
		if($a)  {$this->default_actions[]= $this->Html->image("/images/icons/page_white_add.png")." ".$this->Html->link('Ajouter','add',array('class'=>'noid'));}
		if($e)  {$this->default_actions[]= $this->Html->image("/images/icons/page_white_edit.png")." ".$this->Html->link('Modifier','edit');}
		if($d)  {$this->default_actions[]= $this->Html->image("/images/icons/page_white_delete.png")." ".$this->Html->link('Supprimer','delete',array('class'=>'confirm'));}
	}
	
	function register_defaulta($id){
	//	$this->default_actions[]= $this->Html->link('Consulter','view');
		$this->default_actions[]= $this->Html->link('Ajouter','add/'.$id,array('id'=>"btn_add_pop",'class'=>'noid'));
		$this->default_actions[]= $this->Html->link('Modifier','edit/'.$id,array('id'=>"btn_edit_pop"));
		$this->default_actions[]= $this->Html->link('Supprimer','delete/'.$id,array('class'=>'confirm'));
	}
	
	function register($action){
		$this->default_actions[]= $action;
	}	
	function toscreen(){
		foreach ($this->default_actions as $action) {
			echo $action;
		}
	}

}
?>