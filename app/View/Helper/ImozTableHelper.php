<?php
class ImozTableHelper extends HtmlHelper{
	var $helpers = array('Paginator');
	var $rows = array();
	var $defaultOptions =  array('width'=>50,'class'=>'textleft');
  
  
  
  
  
	function getTable($columns,$modelName='0',$class=null,$paginate=true){
	    $class = 'display select sortTable '.$class;
		echo '<div id="C000'.$modelName.'">' ;
		echo '<table id="T000'.$modelName.'" class="'.$class.'" rel="datatable" cellspacing="0" cellspadding="0">';
				$headerTexts = Set::extract('/headerText',$columns);
				echo '<thead>'.$this->ths($columns).'</thead>';
				$body =  array();
				foreach ($this->rows as $row){
					$myRow = array();
					$i=0;
					foreach  ($columns as $column){
						$index = $column['index'];
						$rowVal=Set::extract($index,$row);
						if (!is_null($modelName)){
							$row_id = Set::extract("/$modelName/id",$row);	
							$cellVal = ($i==0) ? $this->cellRender($rowVal[0],$column,$row_id[0]) : $this->cellRender($rowVal[0],$column);
						}
						else {
							$cellVal = $this->cellRender($rowVal[0],$column);
						}
						
						$myRow[] = $cellVal;
						$i++;
					}
					$body []=$myRow;
				}
				
				echo $this->tableCells($body);	
		if ($paginate){
			echo 	'<tfoot style="display:block">'
						.$this->tableHeaders(array($this->paginator()),null,array('colspan'=>count($columns)))
					.'</tfoot>' ;
		}
		echo '</table>' ;
		echo '</div>' ;
	}
	
	
	function ths($columns){
		$ths ='';
		foreach ($columns as $column){
			$options =$this->defaultOptions;
			if(!empty($column['width'])){  
				$options['width'] = $column['width'];
			}
			if(!empty($column['type'])){  
				$options['class'] = $column['type'];
			}
			$ths =$ths.$this->tag('th',$column['headerText'],$options);
		}	
		return $this->tag('tr',$ths);	
	}
	
	
	
	function paginator()
    {
		$retour =  '<div class="paging" id="paging_links">';
				$retour .=  $this->Paginator->counter(array(
		'format' => __('Nbre lignes: %count%, Nbre de pages: %pages% &nbsp;&nbsp;&nbsp;&nbsp;', true)
		));
			$retour .=   $this->Paginator->prev('<< ' . __('Précedent', true), array(), null, array('class'=>'disabled'));
		$retour .=  ' | ';
		$retour .=  $this->Paginator->numbers();
		$retour .=  '|';
		$retour .=  $this->Paginator->next(__('Suivant', true) . ' >>', array(), null, array('class' => 'disabled'));
		$retour .=  '</div>';
		return $retour;
    }
	
	
	
	function cellRender($rowVal,$column,$id=null){
		$ret =  array($rowVal);
		$options = $this->defaultOptions;
		if (!is_null($id)){
			$options['id'] = 'id_'.$id;
		} 
		if (!empty($column['type'])){
			$options['class'] = $column['type'];
		}
		$ret = array_merge($ret,array($options)); 
		return $ret;
	}
	
	
}
?>