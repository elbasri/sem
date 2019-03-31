<div class="affichage"> 
<table >
<tr>
<th>Numéro</th>
<?php if($this->Session->read('typeoperation')=='triparservice'){ ?>
<th>Distination</th>
<?php } ?>
<th>Type</th>
<th>Quantité</th>
<th>Date</th>
<?php if($this->Session->read('typeoperation')!='groupservices'){?>
<th>L'article</th>
<?php }?>
<?php if($this->Session->read('typeoperation')=='sortie' or $this->Session->read('typeoperation')=='groupservices'){?>
<th>Destination</th>
<?php }?>
<?php if($this->Session->read('typeoperation')=='entree'){?>
<th>Fournisseur</th>
<?php }?>
<th style="width:150px">Action</th>
</tr>
<?php 
//$count=0; $sortie=0; $entree=0; $tauxe=0; $tauxs=0; $taux=0; $qtee=0; $qtes=0; $qte=0;
foreach($post as $post): 
//$count++; $taux=$taux+$post['Stockaction']['cout']; $qte=$qte+$post['Stockaction']['qte'];
?>
<tr>
<td><?php echo $post['Stockaction']['id'];?></td>
<?php if($this->Session->read('typeoperation')=='triparservice'){ ?>
<td><?php echo $this->Html->link($post['Stockaction']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Stockaction']['client_id'],Inflector::slug($post['Stockaction']['client_nom'],$replacement ='_')));?></td>
<?php } ?>
<td><?php echo $this->Html->link($post['Stockaction']['nom'],array('controller'=>'stockactions','action'=>'view',$post['Stockaction']['id'],Inflector::slug($post['Stockaction']['nom'],$replacement ='_')));?></td>
<td><?php 
if($this->Session->read('typeoperation')=='groupmaterielentree' or $this->Session->read('typeoperation')=='groupmaterielsortie' or $this->Session->read('typeoperation')=='groupservices')
    echo $post['Stockaction']['qtt']." ";
else 
    echo $post['Stockaction']['qte']." ";
	if($post['Stockaction']['typevaleur']=="2")
		echo "<strong>".$config['Configuration']['volume']."</strong>";
	else if($post['Stockaction']['typevaleur']=="3")
		echo "<strong>".$config['Configuration']['poids']."</strong>";?></td>
<td><?php echo $post['Stockaction']['date'];?></td>
<?php if($this->Session->read('typeoperation')!='groupservices'){?>
<td><?php echo $this->Html->link($post['Stockaction']['materiel_nom'],array('controller'=>'materiels','action'=>'view',$post['Stockaction']['materiel_id'],Inflector::slug($post['Stockaction']['materiel_nom'],$replacement ='_')));?></td>
<?php }?>
<?php if($this->Session->read('typeoperation')=='sortie' or $this->Session->read('typeoperation')=='groupservices'){
?>
<td><?php 
echo $this->Html->link($post['Stockaction']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Stockaction']['client_id'],Inflector::slug($post['Stockaction']['client_nom'],$replacement ='_')));

?></td>
<?php } ?>
<?php if($this->Session->read('typeoperation')=='entree'){
?>
<td><?php 
echo $this->Html->link($post['Stockaction']['fournisseur_nom'],array('controller'=>'clients','action'=>'view',$post['Stockaction']['fournisseur_id'],Inflector::slug($post['Stockaction']['fournisseur_nom'],$replacement ='_')));

?></td>
<?php } //if($post['Stockaction']['nom']=="sortie"){ $sortie++;  $tauxs=$tauxs+$post['Stockaction']['cout']; $qtes=$qtes+$post['Stockaction']['qte']; } else { $entree++; $tauxe=$tauxe+$post['Stockaction']['cout']; $qtee=$qtee+$post['Stockaction']['qte'];}
?>
<td>
<?php 
echo $this->Form->postLink('Supprimer',array('controller'=>'stockactions','action'=>'supprimer',$post['Stockaction']['id']));
?><br/>
<a href="<?=$this->Html->url('/')?>stockactions/imprimer/<?php echo $post['Stockaction']['id']?>/pdf" target="_blank">BL</a><br/>
<a href="<?=$this->Html->url('/')?>factures/add/<?php echo $post['Stockaction']['id']?>" target="_blank">Ajouter au BL</a><br/>
<a href="<?=$this->Html->url('/')?>factures/modifier/<?php echo $post['Stockaction']['id']?>/s" target="_blank">Supprimer du BL</a>
</td>
</tr>
<?php endforeach; unset($post);?>
</table>

<div class='pagination'>
<?php
if($this->params['paging']['Stockaction']['count']>10){
echo '<p class=\'paginationpage\'>'.$this->Paginator->prev('Précédent').'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->numbers(array('currentClass'=>'paginationpage active')).'</p>';
echo '<p class=\'paginationpage\'>'.$this->Paginator->next('suivante').'</p>';
//echo $this->Paginator->counter('Page {:page} de {:pages} Pages');
 }
 ?>
 </div>
  <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/entree')?>" class="mega-link btn widthcent2"><font class="widthcent3">Entrées</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/sortie')?>" class="mega-link btn widthcent2"><font class="widthcent3">Sorties</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/groupmaterielentree')?>" class="mega-link btn widthcent2"><font class="widthcent3">GP entrées par articles</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/groupmaterielsortie')?>" class="mega-link btn widthcent2"><font class="widthcent3">GP sorties par articles</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/groupservices')?>" class="mega-link btn widthcent2"><font class="widthcent3">GP sorties par Emplacements</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/articleparservice')?>" class="mega-link btn widthcent2"><font class="widthcent3">Articles par Emplacements</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/journale')?>" class="mega-link btn widthcent2"><font class="widthcent3">Tout les opérations</font></a>
		</li>
	</ul>
	</div>
</div>
 <div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/add')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/add.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Ajouter</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/recherche')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/folder_explore.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Rechercher</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/triasc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_right.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri croissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/tridesc')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/arrow_turn_left.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tri décroissant</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/imprimerliste')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/printer_empty.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Imprimer</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/stockactions/imprimerliste/pdf')?>" target="_blank"  class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/page_white_acrobat.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Exporter</font></a>
		</li>
	</ul>
	</div>
</div>
</div>
