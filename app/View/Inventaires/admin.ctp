<div class="affichage">
<table >
<tr>
<th>Emplacement</th>
<th>Désignation/Article</th>
<th>N.INV</th>
<th>QTE</th>
<th>Marque</th>
<th>Fournisseur</th>
<th>Observation</th>
<th>État</th>
<th>Action</th>
</tr>
<?php 
 foreach($post as $post): 
 ?>
<tr>
<td><?php echo $this->Html->link($post['Inventaire']['piece_nom'],array('controller'=>'clients','action'=>'view',$post['Inventaire']['piece_id'],Inflector::slug($post['Inventaire']['piece_nom'],$remplacement='_')));?></td>
<td><?php echo $this->Html->link($post['Inventaire']['nom'],array('controller'=>'inventaires','action'=>'view',$post['Inventaire']['id'],Inflector::slug($post['Inventaire']['nom'],$replacement ='_')));?></td>
<td><?php echo $post['Inventaire']['ref'];?></td>
<td><?php echo $post['Inventaire']['qte'];?></td>
<td><?php echo $this->Html->link($post['Inventaire']['marque_nom'],array('controller'=>'stockcategories','action'=>'view',$post['Inventaire']['marque_id'],Inflector::slug($post['Inventaire']['marque_nom'],$remplacement='_')));?></td>
<td><?php echo $this->Html->link($post['Inventaire']['fournisseur_nom'],array('controller'=>'clients','action'=>'view',$post['Inventaire']['fournisseur_id'],Inflector::slug($post['Inventaire']['fournisseur_nom'],$remplacement='_')));?></td>
<td><?php echo $post['Inventaire']['infos'];?></td>
<td><?php echo $post['Inventaire']['etat'];?></td>
<td>
<?php 
echo $this->HTML->link('Modifier',array('controller'=>'inventaires','action'=>'modifier',$post['Inventaire']['id'])).' '.$this->Form->postLink('Supprimer',array('controller'=>'inventaires','action'=>'supprimer',$post['Inventaire']['id']));

?>
</td>
</tr>
<?php endforeach; unset($post);?>
</table>

<div class='pagination'>
<?php
if($this->params['paging']['Inventaire']['count']>10){
echo '<p class=\'paginationpage\'>'.$this->Paginator->prev('Précédent').'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->numbers(array('currentClass'=>'paginationpage active')).'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->next('suivante').'</p>';
echo $this->Paginator->counter('Page {:page} de {:pages} Pages');
 }
 ?>
 </div>
 <!-- <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/cat1')?>" class="mega-link btn widthcent2"><font class="widthcent3">Meubles</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/cat2')?>" class="mega-link btn widthcent2"><font class="widthcent3">Eletroménager</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/cat3')?>" class="mega-link btn widthcent2"><font class="widthcent3">Informatique</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/cat4')?>" class="mega-link btn widthcent2"><font class="widthcent3">Téléphonie</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/cat5')?>" class="mega-link btn widthcent2"><font class="widthcent3">Hi-Tech</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/cat6')?>" class="mega-link btn widthcent2"><font class="widthcent3">Véhicule</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/cat7')?>" class="mega-link btn widthcent2"><font class="widthcent3">Autres</font></a>
		</li>
	</ul>
	</div>
</div>

<div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/contratg')?>" class="mega-link btn widthcent2"><font class="widthcent3">Avec C. de garatnie</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/contratg')?>" class="mega-link btn widthcent2"><font class="widthcent3">Avec C. de Maintenance</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/contratg')?>" class="mega-link btn widthcent2"><font class="widthcent3">Avec C. d'assurance</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/contratg')?>" class="mega-link btn widthcent2"><font class="widthcent3">Avec C. de location</font></a>
		</li>
	</ul>
	</div>
</div>
-->
<div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<!--<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/fournisseurs')?>" class="mega-link btn widthcent2"><font class="widthcent3">Emplacements</font></a>
		</li>-->
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/localisations')?>" class="mega-link btn widthcent2"><font class="widthcent3">Emplacements</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/familles')?>" class="mega-link btn widthcent2"><font class="widthcent3">Familles</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/marques')?>" class="mega-link btn widthcent2"><font class="widthcent3">Marques</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/tous')?>" class="mega-link btn widthcent2"><font class="widthcent3">Afficher Tous</font></a>
		</li>
	</ul>
	</div>
</div>
 <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Ajouter</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Rechercher</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri croissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri décroissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/imprimerliste')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/printer_empty.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Imprimer</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/inventaires/imprimerliste/pdf')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/page_white_acrobat.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Exporter</font></a>
		</li>
	</ul>
	</div>
</div>
</div>
