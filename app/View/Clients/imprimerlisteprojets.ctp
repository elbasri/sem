<div class="affichage"> 
<table>
<tr>
<th>Numéro</th>
<th>Référence</th>
<th>Libellé</th>
<th>Coût</th>
<th>Date de debut</th>
<th>Date du fin</th>
<th>Nom du Societé</th>
<th>Contact</th>
<th>Tél de contact</th>
</tr>
<?php foreach($projets as $prj):
foreach($users as $user):
if($prj['Projet']['client_id']==$user['Client']['id']){
$nom=$this->Html->link($user['Client']['nom'],array('controller'=>'clients','action'=>'view',$user['Client']['id'],Inflector::slug($user['Client']['nom'],$remplacement='_')));
$prenom=$user['Client']['prenom'];
$tel=$user['Client']['tel'];
}
endforeach; unset($user);
?>
<tr>
<td><?php echo $prj['Projet']['id'];?></td>
<td><?php echo $prj['Projet']['ref'];?></td>
<td><?php echo $this->Html->link($prj['Projet']['nom'],array('controller'=>'projets','action'=>'view',$prj['Projet']['id'],Inflector::slug($prj['Projet']['nom'],$remplacement='_')));?></td>
<td><?php echo $prj['Projet']['cout'];?></td>
<td><?php echo $prj['Projet']['dated'];?></td>
<td><?php echo $prj['Projet']['datef'];?></td>
<td><?php echo $nom;?></td>
<td><?php echo $prenom;?></td>
<td><?php echo $tel;?></td>
</tr>
<?php endforeach; unset($prj);?>
</table>
<div class='pagination'>
 </div><?php echo "<script>window.print();</script>";?>

 </div>
