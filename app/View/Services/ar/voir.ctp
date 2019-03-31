<?php
$titre=$post['Service']['titre'];
$this->element('meta',array('titre'=>$titre));
$link='/'.$post['Service']['id'].'/'.Inflector::slug($post['Service']['titre'],$replacement ='_');

?>

<div class="affichage">

<h1 style="font-size:30px"><?php echo $post['Service']['titre'].'</h1><br/>';
 echo $post['Service']['service'];
?>

<br><br><br>
<div class="button-buy"><a href="<?=$this->Html->url('/')?>demandes/nouvelledemande/service/<?php echo $post['Service']['id']?>" style="color:#fff">Demande de devis</a></div>
</div>
