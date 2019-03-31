<?php  if($test==0){?>
<div class="affichage">
		<?php echo $this->Form->create('Stockaction',array('action'=>'recherche'));?>
		<table style="width:100%">
		<tr>
		<td><input name="rechercher" value="2" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par Date de l'opération</td> 
		<td><?php echo $this->Form->input('dated',array('label'=>'Entre','type'=>'date')); ?></td>
		<td><?php echo $this->Form->input('datef',array('label'=>'Et','type'=>'date')); ?></td>
		</tr>
		
		<tr>
		<td><input name="rechercher" value="1" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par article</td>
		<td><?php echo $this->Form->input('ide',array('label'=>'Recherche Par article')); ?></td>
		</tr>
		
		<tr>
		<td><input name="rechercher" value="3" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par client</td>
		<td><?php echo $this->Form->input('ides',array('label'=>'Recherche Par client')); ?></td>
		<td><br><?php echo $this->Form->end('Lancer un recherche');?></td>
		</tr>
		</table> 
	</div>

<?php }else{?>
<div class="affichage">
	<h1>Resultat de recherche dans les opérations :</h1>
	<table >
	<tr>
<th>Numéro</th>
<th>Type</th>
<th>Quantité</th>
<th>Date</th>
<th>L'article</th>
<?php if($this->Session->read('typeoperation')=='sortie' or $this->Session->read('typeoperation')=='groupservices'){?>
<th>Destination</th>
<?php }?>
<?php if($this->Session->read('typeoperation')=='entree'){?>
<th>Fournisseur</th>
<?php }?>
<th>Action</th>
	</tr>
	<?php $count=0; foreach($realisation	as $post): ?>
<tr>
<td><?php echo $post['Stockaction']['id'];?></td>
<td><?php echo $this->Html->link($post['Stockaction']['nom'],array('controller'=>'stockactions','action'=>'view',$post['Stockaction']['id'],Inflector::slug($post['Stockaction']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Stockaction']['qte'];?></td>
<td><?php echo $post['Stockaction']['date'];?></td>
<td><?php echo $this->Html->link($post['Stockaction']['materiel_nom'],array('controller'=>'materiels','action'=>'view',$post['Stockaction']['materiel_id'],Inflector::slug($post['Stockaction']['materiel_nom'],$replacement ='_')));?></td>
<?php if($this->Session->read('typeoperation')=='sortie' or $this->Session->read('typeoperation')=='groupservices'){
?>
<td><?php 
echo $this->Html->link($post['Stockaction']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Stockaction']['client_id'],Inflector::slug($post['Stockaction']['client_nom'],$replacement ='_')));

?></td>
<?php } ?>
<?php if($this->Session->read('typeoperation')=='entree'){
?>
<td><?php 
echo $this->Html->link($post['Stockaction']['fournisseur_nom'],array('controller'=>'clients','action'=>'view',$post['Stockaction']['client_id'],Inflector::slug($post['Stockaction']['client_nom'],$replacement ='_')));

?></td>
<?php }?>
<td>
<?php 
echo $this->Form->postLink('Supprimer',array('controller'=>'stockactions','action'=>'supprimer',$post['Stockaction']['id']));
?>
</td>
</tr>
	<?php $count++; endforeach; unset($post);?>
	</table>
	<h2><?php if($count==0) echo "Aucun Resultat !";?></h2>
	<h2><a href="recherche" >Nouvelle Recherche</a></h2>
	</div>
<?php }?>
