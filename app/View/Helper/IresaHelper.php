<?php
class IresaHelper extends AppHelper{
	var $helpers = array('Html','Session','Lng');
	var $field   = 'tarif' ;	
	var $hotel_id = '' ;
	var $chambres   = array();
	var $chambre_bb = array() ;
	var $data  = array();
	
	var $startDate ;
	var $endDate ;
	var $n_days ;

	
	
	function links($type,$annee,$mois,$title,$hotel_id = 0){
		$currentDate = new DateTime(date('Y-m-'.'01'));
		
		$output = '<div class="" style=""><ul class="portlet-tab-nav">' ;
		$output2 = '<div class="portlet" style="height:40px"><h2 style="padding-top:5px">'.$title.'</h2><ul class="portlet-tab-nav">' ;
		
		$j= 0 ;
			for($i=1 ; $i<=22;$i++):
			  $class = '' ;
			  if ($annee.'-'.$mois.'-01' == $currentDate->format('Y-m-d'))  :
					$class = 'portlet-tab-nav-active' ;
			  endif;
			  $link = $this->Html->link($currentDate->format('M y'),
					array('action'=>'inventaire',$type,$currentDate->format('Y'),$currentDate->format('m'),$hotel_id));
			  $li = $this->Html->tag('li',$link,array('class'=>$class,'escape'=>false)) ;
		      $currentDate->modify('+1 month') ;
			  if ($i <=12){
				  $output = $output .$li;
			  }
			  else {
				   $output2 = $output2 .$li;
			  }
			endfor ;	
		
		$output = $output .'</ul></div>' ;
		$output2 = $output2 .'</ul></div>' ;		
		
		return 	 $output.$output2;
	}
	
	function inventaires($type,$annee,$mois,$hotel_id = 0 ){
		$tDate = new DateTime($annee.'-'.$mois.'-01');
		 for($i=1 ; $i<=3;$i++) :
			$this->create($tDate->format('Y'),$tDate->format('m'),$type,$hotel_id);
			$tDate->modify('+1 month');
			echo $this->getPlanning(); 
			
		 endfor ;
	}
	
	function create($annee,$mois,$field='tarif',$hotel_id=0){
	  $this->field = $field;	
	  App::import('Model','Hotel');
	  $MHotel = new Hotel();
	  if ($hotel_id > 0) :
		$this->hotel_id = $hotel_id	;
		  $this->chambres = $MHotel->getChambreList($this->hotel_id) ;
		
	  else  :
		$this->hotel_id = $this->Session->read('Auth.Hotel.id') ;
		$this->chambres = $this->Session->read('HotelChambre'); 	
		
	  endif;
	  
	  $this->chambre_bb =	$MHotel->getChambreBB($this->hotel_id );
	  
	  $this->startDate = new DateTime($annee.'-'.$mois.'-01'); 
	  $this->n_days =$this->startDate->format('t');
	  $this->endDate = new DateTime($annee.'-'.$mois.'-'.$this->n_days); 
	  $this->getInventaire($field);
	}
	
	
	function getPlanning(){
		$output = '<table><tbody>'; 
		$output =$output.$this->_getHeader();
		$output = $output.$this->_PlanningDetail(); 
		$output = $output.'</tbody></table>'; 
		return 	$output;
	}
	
	 function _getHeader(){
		$output = '<tr>' ;
		$output  = $output.$this->Html->tag('td',$this->startDate->format('F'),array('rowspan'=>2, "class"=>"bolded2"));
		$tmpDate = new DateTime($this->startDate->format('Y-m-d')) ;
		
		for ($i=1;$i<=$this->n_days;$i++) :
			$day = $this->Lng->daysFR[$tmpDate->format('D')];
			$output  = $output.$this->Html->tag('td',$day, array("class"=>"bolded"));
			$tmpDate->modify("+1 day");
		endfor ;
		
		$output = $output.'</tr>';
		
		$output = $output.'<tr>';
		$tmpDate = new DateTime($this->startDate->format('Y-m-d')) ;
		 for($i=1;$i<=$this->n_days;$i++) :	
				$class = 'd' ;
				$id = "d".$tmpDate->format('Y-m-d');
				$output  = $output.$this->Html->tag('td',$i,array('id'=>$id,'class'=>$class));
				$tmpDate->modify("+1 day");				
		 endfor;
		$output = $output.'</tr>';
		
		return $output;
	 }
	 
	
	function _PlanningDetail(){
	  $output = '';
	  foreach($this->chambres as $chambre_id=>$chambre) :
		$tmpDate = new DateTime($this->startDate->format('Y-m-d')) ;
		$output = $output.'<tr>' ;	
		
		$ChambreTD = $this->Html->tag('input',null,array('type'=>'hidden','class'=>'chambre_id','value'=>$chambre_id)); 
		$ChambreTD = $ChambreTD.$this->Html->tag('input',null,array('type'=>'hidden','class'=>'chambre_date','value'=>$this->startDate->format('Y-m-d'))); 
		$ChambreTD = $ChambreTD.$chambre ;
		$linkClass =  'chambre_bb' ;
		if(!($this->field == 'tarif')) {
			if (empty($this->data[$chambre_id][$tmpDate->format('Y-m-d')])) :
				$linkClass = $linkClass.' blockLink' ;
			endif;	
		}
		$ChambreTD = $ChambreTD.$this->Html->link( $this->chambre_bb[$chambre_id],"#",array('class'=>$linkClass)); 
		$output = $output.$this->Html->tag('td',$ChambreTD,array('escape'=>false,'class'=>'chambre_bb'));
		    for($i=1;$i<=$this->n_days;$i++) :	
				//$output = $output.$this->Html->tag('td',null,$this->_tdPlanning($chambre_id,$tmpDate));	
				$output = $output.$this->_tdPlanning($chambre_id,$tmpDate);	
				$tmpDate->modify("+1 day");		
			endfor;
		$output = $output.'</tr>' ;
	  endforeach ;
	  
	  return  $output ;
	}
	
	function _tdPlanning($chambre_id,$ladate){
		$params =  array();
		$class  = "n";
		$val = "" ;
		$attente = false ;
		if(isset($this->data[$chambre_id][$ladate->format('Y-m-d')])){
			$val = $this->data[$chambre_id][$ladate->format('Y-m-d')][$this->field];
			$attente = $this->data[$chambre_id][$ladate->format('Y-m-d')]['attente'];
		} 
		if($attente){
			$class.= ($this->field == 'dispo')  ?  ' e3' : ' ';
		}
		switch($val){
			case  '0' : 
				$class.= ($this->field == 'dispo')  ?  ' e2' : ' e1';
				$params['id']='c'.$ladate->format('Y-m-d');
				break;
			case  '' :
				$class = $class.' e0' ;
				$val = ($this->field == 'tarif')  ?  '' : '?'  ;
				break;
			default :
				$class = $class.' e1' ;	
				$params['id']='c'.$ladate->format('Y-m-d');
					break;
		}
		
		$params['class'] = $class;
		return $this->Html->tag('td',$val,$params) ;
	}
	
	function getInventaire(){
	  App::import('Model','Inventaire');
      $Idispo = new Inventaire();
	  $conditions = array() ;
	  $conditions['Inventaire.hotel_id'] =  $this->hotel_id ;
	  $conditions['Inventaire.ladate >='] =  $this->startDate->format('Y-m-d')  ;
	  $conditions['Inventaire.ladate <='] =  $this->endDate->format('Y-m-d')  ;
	    $tmp = $Idispo->find('all',array('conditions'=>$conditions));
		foreach ($tmp as $row){
		$chambre_id =$row['Inventaire']['chambre_id'];
		$this->data[$chambre_id][$row['Inventaire']['ladate']] = array('attente'=>$row['Inventaire']['attente'],$this->field=>$row['Inventaire'][$this->field]
													);
				
		}
	}
	
	
}
?>