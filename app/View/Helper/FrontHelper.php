<?php
class FrontHelper extends AppHelper{
	var $helpers = array('Html','Lng','Session');
	
	
	
	function promo($p){
		$Promotion 				=  ClassRegistry::init('Promotion');
		$x = $p['val1'];
	    $y = $p['val2'];
	    $z = $p['val3'];
		$text = $Promotion->types[$p['type']] ;
		
	    $text =str_replace('x ',$x.' ',$text) ;
	    $text =str_replace(' y ',' '.$y.' ',$text) ;
	    $text =str_replace('z ',$z.' ',$text) ;
		
		echo $text ;
	}
	
	function resa_detail($r){
		$devise = $r['Devise']['code'];
		
		$output = '<table class="resa_detail">'; 
		$heads = '<thead><tr>';
		$body = '<tbody>';
		$i= 0; 
			foreach($r['ReservationDetail'] as $d) :
				if($i % 7 == 0) :
					if($i == 0){$body   .="<tr class='$i'>" ;}
					else{	$body   .="</tr class='$i'><tr>" ;}
				endif;
				if( $i<7) : 
					$tmpD = new DateTime($d['ladate']);
					$day = $this->Lng->daysFR[$tmpD->format('D')];
					$heads  .= $this->Html->tag('th',$day); 
				endif;
				
				$body    .= $this->Html->tag('td',$d['prix']." $devise"); 
				$i++ ;
			endforeach;
			
		$heads .= 	'</tr></thead>' ;
		$body   .= '</tr></tbody>';
		$output .= $heads.$body.'</table>'; 	
		
		return $output;	
	}
	
	function disponibilite($chambre_id,$data,&$etat,&$montant=0,$qte,$devise){
		$deviseCode = $this->devise() ;	
	
		$du 	  =  new DateTime($this->Session->read('Search.du'));
		$au 	  =  new DateTime($this->Session->read('Search.au'));
	
		
		$output = '<table class="chambre_planning">'; 
		$heads = '<thead ><tr>';
		$body = '<tbody>';
		
		$etat =  'disponible';
		$total = 0 ;
		$i= 0;
		
		
			while ($au > $du):
				if($i++ % 7 == 0) :
					if($i == 0){
						$body   .='<tr>' ;
						}
					else {	
						$body   .='</tr><tr>' ;
						}
				endif;
				if(!empty($data[$chambre_id][$du->format('Y-m-d')])) :
						$dispo   = $data[$chambre_id][$du->format('Y-m-d')]['dispo']    ;
						$attente = $data[$chambre_id][$du->format('Y-m-d')]['attente']  ;
						$prix    = $data[$chambre_id][$du->format('Y-m-d')]['prix']     ;
						$prix    = $this->toDevise($prix,$devise);
						$prix_   = null ;
						if(!is_null($data[$chambre_id][$du->format('Y-m-d')]['prix_'])) :
							$prix_ = $data[$chambre_id][$du->format('Y-m-d')]['prix_'] ; 
							$prix_ = $this->toDevise($prix_,$devise);
						endif;
						$qte  = $dispo ;
				else : 
					$dispo = 0;
					$prix  = 0;
					$prix_   = null ;
					$attente = 1;
				endif ;
				$class = '' ;
				
				if($dispo > 0) :
					$class = 'disponible' ;
				else :
					$class = 'indisponible' ;	
					$etat = 'indisponible' ;
					$etat = 'indisponible' ;
				endif;
				
				if($attente == 1 ) :
					$class = 'demande' ;
					$etat = 'demande';
				endif;
				
				if( $i<=7) : 
					$day = $this->Lng->daysFR[$du->format('D')];
					$heads  .= $this->Html->tag('th',$day,array('class'=>$class)); 
				endif;
				
					$prixTxt ='<span>'.$prix." $deviseCode".'</span>' ;
					
				if(!is_null($prix_)) : 
					$prixTxt .= '<br/><span class="ex_price">'.$prix_." $deviseCode".'</span>' ;
				endif;
				
				$body    .= $this->Html->tag('td',$prixTxt,array('class'=>$class)); 
				$total   += $prix ;				
				
				$du->modify("+1 day");
			endwhile;
			
		$heads .= 	'<tr></thead>' ;
		$body   .= '</tr></tbody>';
		
		$output .= $heads.$body.'</table>'; 
		
		$montant = $total ;
		return $output;
	}
		
	
	
	
	
	function toDevise($val ,$devise , $toDevise=null){
		if(!is_null($toDevise)){
			$curDevise = $toDevise ;
		}
		else {
			$curDevise = $this->Session->read('Devise') ;
		}
		
		if($curDevise['id'] == $devise['id'] ):
			$ret = $val ;		
		else :
			$toDefault = $val * $devise['taux'] ;	
			$ret = $toDefault / $curDevise['taux'] ;	
		endif ;
		$ret = round($ret);
		//$ret =  number_format($ret,0,'.',' ');
		return $ret;
	}
	
	function devise(){
		if($this->Session->check('Devise.code')){
			return 	$this->Session->read('Devise.code');
		}else return 'DH' ;
	}
		
	
		
	
	function truncate($val,$chars = 250,$fin = ' ...'){
		if (strlen($val)>$chars){
			return 	substr($val, 0, $chars-strlen($fin)).$fin;
			}
		else{
			return $val ;
		}
		
	}
	
					
		 
function utf8entities($source)
{
//    array used to figure what number to decrement from character order value 
//    according to number of characters used to map unicode to ascii by utf-8
   $decrement[4] = 240;
   $decrement[3] = 224;
   $decrement[2] = 192;
   $decrement[1] = 0;
   
//    the number of bits to shift each charNum by
   $shift[1][0] = 0;
   $shift[2][0] = 6;
   $shift[2][1] = 0;
   $shift[3][0] = 12;
   $shift[3][1] = 6;
   $shift[3][2] = 0;
   $shift[4][0] = 18;
   $shift[4][1] = 12;
   $shift[4][2] = 6;
   $shift[4][3] = 0;
   
   $pos = 0;
   $len = strlen($source);
   $encodedString = '';
   while ($pos < $len)
   {
      $charPos = substr($source, $pos, 1);
      $asciiPos = ord($charPos);
      if ($asciiPos < 128)
      {
         $encodedString .= htmlentities($charPos);
         $pos++;
         continue;
      }
      
      $i=1;
      if (($asciiPos >= 240) && ($asciiPos <= 255))  // 4 chars representing one unicode character
         $i=4;
      else if (($asciiPos >= 224) && ($asciiPos <= 239))  // 3 chars representing one unicode character
         $i=3;
      else if (($asciiPos >= 192) && ($asciiPos <= 223))  // 2 chars representing one unicode character
         $i=2;
      else  // 1 char (lower ascii)
         $i=1;
      $thisLetter = substr($source, $pos, $i);
      $pos += $i;
      
//       process the string representing the letter to a unicode entity
      $thisLen = strlen($thisLetter);
      $thisPos = 0;
      $decimalCode = 0;
      while ($thisPos < $thisLen)
      {
         $thisCharOrd = ord(substr($thisLetter, $thisPos, 1));
         if ($thisPos == 0)
         {
            $charNum = intval($thisCharOrd - $decrement[$thisLen]);
            $decimalCode += ($charNum << $shift[$thisLen][$thisPos]);
         }
         else
         {
            $charNum = intval($thisCharOrd - 128);
            $decimalCode += ($charNum << $shift[$thisLen][$thisPos]);
         }
         
         $thisPos++;
      }
      
      $encodedLetter = '&#'. str_pad($decimalCode, ($thisLen==1)?3:5, '0', STR_PAD_LEFT).';';
      $encodedString .= $encodedLetter;
   }
   
   return $encodedString;
}
	
	
	
	
}
?>