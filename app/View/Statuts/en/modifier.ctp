<div class="affichage"> 
<?php
echo $this->Form->create('Statut');
echo $this->Form->input('ref',array('label' => 'Reference'));
echo $this->Form->input('nom',array('label' => 'Titre'));
echo $this->Form->input('date',array('label' => 'End date'));
echo $this->Form->input('infos',array('label' => 'Infos'));
echo $this->Form->input('etat',array('label' => 'Statut','options'=>array('0'=>'traité','1'=>'encours')));
echo $this->Form->input('type',array('label' => 'Type','options'=>array('0'=>'optionnel','1'=>'obligatoire')));
echo $this->Form->input('fermer',array('label' => 'Fermeture du compte','options'=>array('0'=>'NON','1'=>'OUI')));
echo $this->Form->input('limites',array('label' => 'Limites'));
echo $this->Form->input('id',array('type' => 'hidden'));
echo $this->Form->end('Edit');
?>
</div>



