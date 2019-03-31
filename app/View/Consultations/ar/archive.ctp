<?php
if($this->Session->read('lang')=='ar'){
	echo '<div class="affichagear">  ';
}
else{
	echo '<div class="affichage">  ';
}
?>
				
	<ul class="mega-container mega-grey" >
<?php foreach($postliens as $post): 
					if($this->Session->read('lang')=='ar'){
						$titretext=$post['Consultation']['titrear'];
					}
					else if($this->Session->read('lang')=='en'){
						$titretext=$post['Consultation']['titreen'];
					}
					else{
						$titretext=$post['Consultation']['titre'];
					}
		$id=$post['Consultation']['id'];
		$titre=Inflector::slug($post['Consultation']['titre'],$replacement ='_');
?>
		<li class="mega mega-current" style="width:30%;float:left;margin-left:15px" ><a href="<?=$this->Html->url('/pages/consultation/').$id.'/'.$titre?>" class="mega-link btn widthcent2"><font class="widthcent3"><?php echo $titretext;?></font></a>	</li>
<?php endforeach;?>
<?php unset($liens);?>
	</ul>
<div class='pagination' align="center">
<?php
if($this->params['paging']['Consultation']['count']>15){
echo '<p class=\'paginationpage\'>'.$this->Paginator->prev('Précédent').'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->numbers(array('currentClass'=>'paginationpage active')).'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->next('suivante').'</p>';
echo $this->Paginator->counter('Page {:page} de {:pages} Pages');
 }
 ?>
 
 </div>
</div>
