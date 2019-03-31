<?php  /*if($test==0){?>
<div class="menudetails">
 <?php echo $this->element('menudetails',array('type'=>'compta')); ?>
</div>
<div class="affichage" style="float:right;width:80%">  
		<?php echo $this->Form->create('Compte',array('action'=>'recherche'));?>
		<table style="width:100%">
		<tr>
		<td><input name="rechercher" value="2" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par Start date de compte</td>
		</tr>
		
		<tr><td></td><td></td>
		<td><?php echo $this->Form->input('dated',array('label'=>'Entre')); ?></td>
		<td><?php echo $this->Form->input('datef',array('label'=>'Et')); ?></td>
		</tr>
		
		<tr>
		<td><input name="rechercher" value="1" required="" type="radio"></td>
		<td style="text-align:left;">Recherche par ID de compte</td>
		</tr>
		
		<tr><td></td><td></td>
		<td><?php echo $this->Form->input('ide',array('label'=>'Recherche Par ID')); ?></td>
		<td><br><?php echo $this->Form->end('Lancer un recherche');?></td>
		</tr>
		</table> 
	</div>

<?php }else{?>
<div class="menudetails">
 <?php echo $this->element('menudetails',array('type'=>'compta')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
	<h1>Resultat de recherche dans les comptes :</h1>
	<table >
	<tr>
	<th>ID</th>
	<th>Name de la banque</th>
	<th>ID de compte</th>
	<th>IBAN</th>
	<th>Code SWIFT/BIC</th>
	<th>Action</th>
	</tr>
	<?php $count=0; foreach($realisation	as $post): ?>
	<tr>
	<td><?php echo $post['Compte']['id'];?></td>
	<td><?php echo $this->Html->link($post['Compte']['nom'],array('controller'=>'comptes','action'=>'view',$post['Compte']['id'],Inflector::slug($post['Compte']['nom'],$replacement ='_')));?></td>
	<td><?php echo $post['Compte']['iban'];?></td>
	<td><?php echo $post['Compte']['swift'];?></td>
	<?php 
	echo $this->HTML->link('Edit',array('controller'=>'comptes','action'=>'Edit',$post['Compte']['id'])).' '.$this->Form->postLink('Delete',array('controller'=>'comptes','action'=>'Delete',$post['Compte']['id']));

	?>
	</td>
	</tr>
	<?php $count++; endforeach; unset($post);?>
	</table>
	<h2><?php if($count==0) echo "No Result!";?></h2>
	<h2><a href="recherche" >New Search</a></h2>
	</div>
<?php }?>