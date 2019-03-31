<?php
$titre=$post['Produit']['titre'];
$this->element('meta',array('titre'=>$titre));
$link='/'.$post['Produit']['id'].'/'.Inflector::slug($post['Produit']['titre'],$replacement ='_');

?>

<div class="affichage">

<h1 style="font-size:30px"><?php echo $post['Produit']['titre'].'</h1><br/>';
 echo $post['Produit']['produit'];
?>
<br><br><br>
<div class="button-buy"><a href="<?=$this->Html->url('/')?>demandes/nouvelledemande/produit/<?php echo $post['Produit']['id']?>" style="color:#fff">Commander</a></div>
</div>
