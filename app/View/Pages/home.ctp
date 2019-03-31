<?php
if($this->Session->read('lang')=='ar')
	$titre=$config['Configuration']['titrear'];
else if($this->Session->read('lang')=='en')
	$titre=$config['Configuration']['titreen'];
else
	$titre=$config['Configuration']['titre'];
$this->element('meta',array('titre'=>$titre));
?>
<?php
$titre=$title_for_layout;
$this->element('meta',array('titre'=>$titre));
 echo $this->element('slider');
 //echo $this->element('contentaccueil');
 //echo $this->element('main');
  
/* foreach($gaga as $g):
	echo $gaga['Slider']['titre'];
	endforeach;
*/
?>


