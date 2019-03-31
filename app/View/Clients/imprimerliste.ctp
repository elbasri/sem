<div class="affichage"> 
<table>
<tr>
<th>Service/établissement</th>
<th>Responsable</th>
<th>Tél</th>
</tr>
<?php 
foreach($users as $user):
?>
<tr>
<td><?php echo $this->Html->link($user['Client']['nom'],array('controller'=>'clients','action'=>'view',$user['Client']['id'],Inflector::slug($user['Client']['nom'],$remplacement='_')));?></td>
<td><?php if($user['Client']['prenom']!=null) echo $user['Client']['civilite']." ".$user['Client']['prenom']; else echo "indéfinie";?></td>
<td><?php if($user['Client']['tel']!=null) echo $user['Client']['tel']; else echo "indéfinie";?></td>
</tr>
<?php endforeach; unset($users);?>
</table>
<?php echo "<script>window.print();</script>";?>
 </div>
