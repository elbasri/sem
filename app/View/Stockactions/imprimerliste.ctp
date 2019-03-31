<div class="affichage"> 
<?php if($this->Session->read('typeoperation')=='articleparservice'){ ?>

<?php
$qte=0; $article="walo"; $array = array(); $first=0; $inc=0; $testclient=0; $testclientid=0; $countallinc=1;
$countall= sizeof($post);
foreach($post as $post):
$countallinc++;
if($article!=$post['Stockaction']['materiel_nom']){
	
	$count= sizeof($array);
	if($count>0){
		print "<table><tr><th>Distination</th><th>Quantité</th><th>Dates</th></tr>";
		for ($i = 0; $i < $count; $i++) {
			print "<tr><td>".$array[$i]['client']."</td><td>".$array[$i]['qte']."</td><td>".$array[$i]['date']."</td>";
		}
		print "</tr></table>";
	}
	$article=$post['Stockaction']['materiel_nom'];
	
print "<h2>".$article."</h2>";
	/*foreach($array as $emp):
		print_r ($emp);
		endforeach;*/
	$array = array();
	$inc=0;
}
$client=h($post['Stockaction']['client_nom']);
$qte=$post['Stockaction']['qte'];
$date=$post['Stockaction']['date'];

	$count= sizeof($array);
	for ($i = 0; $i < $count; $i++) {
		if($array[$i]['client']==$client){
			$testclient=1;
			$testclientid=$i;
		}
	}
	if ($testclient==1){
		$array[$testclientid]['qte']+=$qte;
		$array[$testclientid]['date']=$array[$testclientid]['date']." <br> ".$date;
		$testclient=0;
	}
	else{
		$array += [$inc => ['client' => $client,'qte' => $qte,'date' => $date]];
		$inc++;
	}
	
	if($countall<$countallinc){
		$count= sizeof($array);
		print "<table><tr><th>Distination</th><th>Quantité</th><th>Dates</th></tr>";
		for ($i = 0; $i < $count; $i++) {
			print "<tr><td>".$array[$i]['client']."</td><td>".$array[$i]['qte']."</td><td>".$array[$i]['date']."</td>";
		}
		print "</tr></table>";
	}
	//print_r($array);
?>
<!--


<tr>
<td><?php echo $this->Html->link($post['Stockaction']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Stockaction']['client_id'],Inflector::slug($post['Stockaction']['client_nom'],$replacement ='_')));?></td>


<td>
<?php echo $post['Stockaction']['qte']." ";
	if($post['Stockaction']['typevaleur']=="2")
		echo "<strong>".$config['Configuration']['volume']."</strong>";
	else if($post['Stockaction']['typevaleur']=="3")
		echo "<strong>".$config['Configuration']['poids']."</strong>";?>
</td>
	
-->
<?php endforeach; unset($post);?>



<?php }else if($this->Session->read('typeoperation')=='groupmaterielentree'){ ?>

<table>
<tr>
<th>L'article</th>
<th>Quantité</th>
</tr>
<?php 
$countsrv=0; $srv;
foreach($post as $post): 
?>
<tr>
	

<td><?php echo $this->Html->link($post['Stockaction']['materiel_nom'],array('controller'=>'materiels','action'=>'view',$post['Stockaction']['materiel_id'],Inflector::slug($post['Stockaction']['materiel_nom'],$replacement ='_')));?></td>

<td><?php 
if($this->Session->read('typeoperation')=='groupmaterielentree' or $this->Session->read('typeoperation')=='groupmaterielsortie' or $this->Session->read('typeoperation')=='groupservices')
    echo $post['Stockaction']['qtt']." ";
else 
    echo $post['Stockaction']['qte']." ";
	if($post['Stockaction']['typevaleur']=="2")
		echo "<strong>".$config['Configuration']['volume']."</strong>";
	else if($post['Stockaction']['typevaleur']=="3")
		echo "<strong>".$config['Configuration']['poids']."</strong>";?></td>

</tr>
<?php endforeach; unset($post);?>
</table>

<? }else{ ?>




<table >
<tr>
<?php if($this->Session->read('typeoperation')=='triparservice'){ ?>
<th>Distination</th>
<?php } ?>
<th>Quantité</th>
<th>Date</th>
<?php if($this->Session->read('typeoperation')!='groupservices'){?>
<th>L'article</th>
<?php }?>
<th>Destination</th>
<?php if($this->Session->read('typeoperation')=='sortie' or $this->Session->read('typeoperation')=='groupservices'){?>
<th>Destination</th>
<?php }?>
<?php if($this->Session->read('typeoperation')=='entree'){?>
<th>Fournisseur</th>
<?php }?>
</tr>
<?php 
//$count=0; $sortie=0; $entree=0; $tauxe=0; $tauxs=0; $taux=0; $qtee=0; $qtes=0; $qte=0;
$countsrv=0; $srv;
foreach($post as $post): 
//$count++; $taux=$taux+$post['Stockaction']['cout']; $qte=$qte+$post['Stockaction']['qte'];
?>
<tr>

<?php
if($this->Session->read('typeoperation')=='triparservice'){
?>
<td><?php
if($countsrv==0)
	$srv=$post['Stockaction']['client_nom'];
if($srv==$post['Stockaction']['client_nom'] and $countsrv==0)
	echo $this->Html->link($post['Stockaction']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Stockaction']['client_id'],Inflector::slug($post['Stockaction']['client_nom'],$replacement ='_')));
else if($srv==$post['Stockaction']['client_nom'] and $countsrv!=0)
	echo "";

$countsrv++;
if($srv!=$post['Stockaction']['client_nom'] and $countsrv!=0){
	$countsrv=0;
}
?></td>
<?php } ?>

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

<td><?php 
echo $this->Html->link($post['Stockaction']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Stockaction']['client_id'],Inflector::slug($post['Stockaction']['client_nom'],$replacement ='_')));

?></td>


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

</tr>
<?php endforeach; unset($post);?>
</table>

<? } ?>
</div>
