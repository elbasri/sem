<div class="affichagear">  
<?php				
echo $this->Form->create('Aide');
echo $this->Form->input('nom',array('label' => 'العنوان'));
echo $this->Form->input('lien',array('label' => 'الرابط'));
echo $this->Form->end('إضافة');
?>

</div>