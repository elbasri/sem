<div class="affichage"> 
<table >
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Sujet</th>
<th>Titre</th>
<th>Contact</th>
<th>Date</th>
<th>Action</th>
</tr>
<?php 
$count=0; $exp=0; $enc=0;
foreach($post as $post): 
$count++;
if(date('Y-m-d')<$post['Agenda']['date'])
	$enc++;
if(date('Y-m-d')>$post['Agenda']['date'])
	$exp++;
?>
<tr>
<td><?php echo $post['Agenda']['id'];?></td>
<td><?php echo $this->Html->link($post['Agenda']['ref'],array('controller'=>'agendas','action'=>'view',$post['Agenda']['id'],Inflector::slug($post['Agenda']['ref'],$replacement ='_')));?></td>
<td><?php echo $post['Agenda']['typep'];?></td>
<td><?php

if($post['Agenda']['typep']=="Article du stock")
	echo $this->Html->link($post['Agenda']['projet_nom'],array('controller'=>'materiels','action'=>'view',$post['Agenda']['projet_id'],Inflector::slug($post['Agenda']['projet_nom'],$replacement ='_')));
else if($post['Agenda']['typep']=="Produit du site web")
	echo $this->Html->link($post['Agenda']['projet_nom'],array('controller'=>'produits','action'=>'view',$post['Agenda']['projet_id'],Inflector::slug($post['Agenda']['projet_nom'],$replacement ='_')));
else if($post['Agenda']['typep']=="Service du site web")
	echo $this->Html->link($post['Agenda']['projet_nom'],array('controller'=>'services','action'=>'view',$post['Agenda']['projet_id'],Inflector::slug($post['Agenda']['projet_nom'],$replacement ='_')));
else if($post['Agenda']['typep']=="Devis")
	echo $this->Html->link($post['Agenda']['projet_nom'],array('controller'=>'devises','action'=>'view',$post['Agenda']['projet_id'],Inflector::slug($post['Agenda']['projet_nom'],$replacement ='_')));
else if($post['Agenda']['typep']=="Commande")
	echo $this->Html->link($post['Agenda']['projet_nom'],array('controller'=>'commandes','action'=>'view',$post['Agenda']['projet_id'],Inflector::slug($post['Agenda']['projet_nom'],$replacement ='_')));
else if($post['Agenda']['typep']=="Facture")
	echo $this->Html->link($post['Agenda']['projet_nom'],array('controller'=>'factures','action'=>'view',$post['Agenda']['projet_id'],Inflector::slug($post['Agenda']['projet_nom'],$replacement ='_')));
else if($post['Agenda']['typep']=="Autre")
	echo $post['Agenda']['projet_nom'];

?></td>
<td><?php echo $this->Html->link($post['Agenda']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Agenda']['client_id'],Inflector::slug($post['Agenda']['client_nom'],$replacement ='_')));?></td>
<td><?php echo $post['Agenda']['date'];?></td>
<td>
<?php 
echo $this->HTML->link('Modifier',array('controller'=>'agendas','action'=>'modifier',$post['Agenda']['id'])).' '.$this->Form->postLink('Supprimer',array('controller'=>'agendas','action'=>'supprimer',$post['Agenda']['id']));
?>
</td>
</tr>
<?php endforeach; unset($post);?>
</table>

<h3>Résumé</h3>
<table>
	<tr>
		<th>Nombre de rendez-vous</th>
		<th>Términés</th>
		<th>A venir</th>
	</tr>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $exp;?></td>
		<td><?php echo $enc;?></td>
	</tr>
</table>
<?php echo "<script>window.print();</script>";?>
</div>