<div class="affichage"> 
<?php 
if($post){
$titre=$post['Annuaire']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table >
				<tr>
					<td style="width:35%">Titre: <strong><?php echo $post['Annuaire']['nom'];?></strong>
					</td>
					
					<td style="width:35%">Image: <strong><img src="<?=$this->Html->url('/').$post['Annuaire']['img'];?>"/></strong>
					</td>
				</tr>
				<tr>
					<td style="width:35%">Date de fin: <strong><?php echo $post['Annuaire']['date'];?></strong>
					</td>
					
					<td style="width:35%"><?php if($post['Annuaire']['type']=='1') echo "Type:<strong><font color='red'> obligatoire</font></strong>"; else if($post['Annuaire']['etat']=='1') echo "<a href='".$this->Html->url('/')."statuts/done'>Cacher l'alert</a>";?>
					</td>
				</tr>
			</table>	
<br><h2>Détails:</h2>	
<?php echo $post['Annuaire']['infos'];?>		
	</div>	
<?php }else{?>
<h2>Il y à un erreur avec la statut de votre système!<br> Merci de nous contacter pour traiter ce probleme</h2>	
<?php }?>		
</div>