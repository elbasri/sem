<div class="affichage">  
<?php				
echo $this->Form->create('Aide');
echo $this->Form->input('nom',array('label' => 'Titre'));
echo $this->Form->input('lien',array('label' => 'Lien'));
echo $this->Form->end('Ajouter');
?>

</div>