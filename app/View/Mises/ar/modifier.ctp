<div class="affichage"> 
<?php
echo $this->Form->create('Mise');
echo $this->Form->input('nom',array('label' => 'Titre'));
echo $this->Form->input('lien',array('label' => 'Lien'));
echo $this->Form->input('id',array('type' => 'hidden'));
echo $this->Form->end('Modifier');
?>
</div>



