<div class="affichage"> 
<?php 
$titre=$post['Agenda']['projet_nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table>
				<tr >
					<td style="width:35%">Référence: <strong><?php echo $post['Agenda']['ref'];?></strong>
					</td>
					
					<td style="width:35%">Date: <strong><?php echo $post['Agenda']['date'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Sujet: <strong><?php echo $post['Agenda']['typep'];?></strong>
					</td>
					
					<td style="width:35%">Titre: <strong><?php 
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
					?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Contact: <strong><?php echo $this->Html->link($post['Agenda']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Agenda']['client_id'],Inflector::slug($post['Agenda']['client_nom'],$replacement ='_')));?></strong>
					</td>
					
					<td style="width:35%">
					</td>
				</tr>
				<tr >
					<td style="width:35%">Début: <strong><?php echo $post['Agenda']['dated'];?></strong>
					</td>
					
					<td style="width:35%">Fin: <strong><?php echo $post['Agenda']['datef'];?></strong>
					</td>
				</tr>
			</table>	

<?php echo "<script>window.print();</script>";?>								
	</div>	
		
</div>