<div class="affichage">  
<?php				
echo $this->Form->create('Aide');
echo $this->Form->input('nom',array('label' => 'Title'));
echo $this->Form->input('lien',array('label' => 'Link'));
echo $this->Form->end('Add');
?>

</div>