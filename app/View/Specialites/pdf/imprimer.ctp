<div class="affichage">
<?php 
$titre=$post['Specialite']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		هذه صفحة تجريبية
			<table >
				<tr >
					<td style="width:35%">Libellé: <strong><?php echo $post['Specialite']['nom'];?></strong>
					</td>
					
					<td style="width:35%"> <strong></strong>
					</td>
					
				</tr>

			</table>	
<br><h2>Description de Spécialité:</h2> 
<?php echo $post['Specialite']['infos'];?>

<?php echo "<script>window.print();</script>";?>								
	</div>	
		
</div>