<div class="affichage"> 
<?php
echo $this->Form->create('Annuaire');
echo $this->Form->input('nom',array('label' => 'L\'entreprise'));
echo $this->Form->input('img',array('label' => 'L\'image','id'=>'SliderPhoto'));
echo '<h3>&nbsp;<a href="#" style="text-align:center"  onclick="openFileBrowserSliderPhoto(); return false;" >Selectionner</a></h3>';
echo $this->Form->input('desc',array('label' => 'Description'));
echo $this->Form->input('secteur',array('label' => 'Secteur'));
echo $this->Form->input('site',array('label' => 'Site WEB'));
echo $this->Form->input('demande',array('label' => 'Page de Contact'));
echo $this->Form->input('etat',array('label' => 'Statut','options'=>array('0'=>'Caché','1'=>'Affiché')));
echo $this->Form->input('id',array('type' => 'hidden'));
echo $this->Form->end('Modifier');
?>
</div>



