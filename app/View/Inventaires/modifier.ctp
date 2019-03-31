<div class="affichage">
<?php echo $this->Form->create('Inventaire'); ?>
<table>
<tr><td><?php echo $this->Form->input('nom_id',array('label' => 'Désignation','options' => $optionsdes,'style'=>'width: 100%')); ?></td>
<td><?php echo $this->Form->input('piece_id', array('label'=>'Emplacement','options' => $optionsemp,'style'=>'width: 100%','default'=>61)); ?></td>
</tr>

<tr>
<td><?php echo $this->Form->input('qte',array('label' => 'Quantité')); ?></td>
<td><?php echo $this->Form->input('etat',array('label' => 'Etat','options'=>array('Bon'=>'Bon','Très bon'=>'Très bon','Moyen'=>'Moyen','Mauvaise'=>'Mauvaise'),'style'=>'width: 100%')); ?></td>
</tr>

<tr>
<td style="width:50%"><?php echo $this->Form->input('ref',array('label' => 'N.INV')); ?></td>
<td style="width:50%"><?php echo $this->Form->input('refs',array('label' => 'N.Serie')); ?></td>
</tr>
<tr>
<td><?php echo $this->Form->input('famille_id', array('label'=>'Famille','options' => $optionsfam,'style'=>'width: 100%','default'=>69)); ?></td>
<td><?php echo $this->Form->input('marque_id', array('label'=>'Marque','options' => $optionsmar,'style'=>'width: 100%','default'=>70)); ?></td>
</tr>

<tr>
<td><?php echo $this->Form->input('fournisseur_id', array('label'=>'Fournisseur','options' => $optionsfo,'style'=>'width: 100%','default'=>16)); ?></td>
<td><?php echo $this->Form->input('infos',array('label' => 'Observation')); ?></td>
</tr>

</table>
<?php
echo $this->Form->input('id',array('type' => 'hidden'));
echo $this->Form->end('Modifier');
?>
</div>



