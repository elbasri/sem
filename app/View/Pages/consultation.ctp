<?php
$id=$post['Consultation']['id'];

if($this->Session->read('lang')=='ar'){
$titre=$post['Consultation']['titrear'];
	if($id==1)
		$titre=$config['Configuration']['quitextar'];
	if($id==2)
		$titre=$config['Configuration']['pourtextar'];
}
else if($this->Session->read('lang')=='en'){
$titre=$post['Consultation']['titreen'];
	if($id==1)
		$titre=$config['Configuration']['quitexten'];
	if($id==2)
		$titre=$config['Configuration']['pourtexten'];
}
else{
$titre=$post['Consultation']['titre'];
	if($id==1)
		$titre=$config['Configuration']['quitext'];
	if($id==2)
		$titre=$config['Configuration']['pourtext'];
}
$this->element('meta',array('titre'=>$titre));
?>


<div style="float:right;width:80%"> 
<h1 style="font-size:30px"><?php echo $titre.'</h1><br/>';

if($this->Session->read('lang')=='ar'){
echo $post['Consultation']['consultationar'];
}
else if($this->Session->read('lang')=='en'){
echo $post['Consultation']['consultationen'];
}
else{
echo $post['Consultation']['consultation'];
}
?>
</div>
<div class="menudetails">
 <?php echo $this->element('menudetails',array('type'=>'pagesweb')); ?>
</div>