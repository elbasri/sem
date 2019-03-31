<div class="affichage"> 
<?php 
if($post){
$titre=$post['Statut']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table >
				<tr>
					<td style="width:35%">Référence: <strong><?php echo $post['Statut']['ref'];?></strong>
					</td>
					
					<td style="width:35%">Statut actuel: <strong><?php echo $post['Statut']['nom'];?></strong>
					</td>
				</tr>
				<tr>
					<td style="width:35%">Date de fin: <strong><?php echo $post['Statut']['date'];?></strong>
					</td>
					
					<td style="width:35%"><?php if($post['Statut']['type']=='1') echo "Type:<strong><font color='red'> obligatoire</font></strong>"; else if($post['Statut']['etat']=='1') echo "<a href='".$this->Html->url('/')."statuts/done'>Cacher l'alert</a>";?>
					</td>
				</tr>
			</table>	
<br><h2>Détails:</h2>	
<?php echo $post['Statut']['infos'];?>		
	</div>	
<?php }else{?>
<h2>Il y à un erreur avec la statut de votre système!<br> Merci de nous contacter pour traiter ce probleme</h2>	
<?php }?>		
</div>