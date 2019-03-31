<div class="recruterdiv2" align="center" style="margin-left:20px">
<?php 
$domain = "http://".$_SERVER['SERVER_NAME'];
foreach($post as $post):
if($post['Annuaire']['etat']=='1'){




   $titre=$post['Annuaire']['nom'];
   $lien=$post['Annuaire']['site'];
   
   $image=$post['Annuaire']['img'];
   if(substr($image, 0, 4)!=="http"){
	   if(substr($image, 0, 13)=="/app/webroot/")
			$image = substr($image, 13);
	   if(substr($image, 0, 1)=="/")
			$image = substr($image, 1);
		if (!file_exists($image))
			$image=$this->Html->url('/')."img/images/slider.jpg";
		else
			$image=$domain.$this->Html->url('/').$image;
	}
	else{
		if(!checkRemoteFile($image))
			$image=$this->Html->url('/')."img/images/slider.jpg";
	}

?>
<div class="product" >
<!--image_non_disponible.jpeg-->
  <img class="product-img" src="<?php echo $image ;?>" alt="<?php echo $post['Annuaire']['nom'];?>"/>
  <div class="product-actions">
    <div class="product-info">
        <p style="background:black;color:#fff"><strong><?php echo $post['Annuaire']['secteur'];?></strong></p>
      <div class="info-block">  
        <div class="product-title"><a href="<?php echo $post['Annuaire']['site'];?>"><?php echo $post['Annuaire']['nom'];?></a></div>
        <div class="product-description" ><?php echo substr($post['Annuaire']['desc'], 0, 100);?></div>
        <div class="product-sale"><?php 
		if(!empty($post['Annuaire']['prix'])){
		echo "<br>".$post['Annuaire']['prix']; echo " ".$config['Configuration']['Devises']; }?></div>
        <div class="product-prize"><?php //echo $post['Annuaire']['remise'];?> </div>
        <div class="button-buy"><a href="<?php echo $post['Annuaire']['demande'];?>" style="color:#ffffff">Page de contact</a></div>
        <div class="add"><a href="<?php echo $post['Annuaire']['site'];?>">SITE</a></div>
      </div>
    </div>
  </div> 
    <div class="nav" align="left">
      <ul>
        <li><a href="<?php echo $lien;?>" style="">Site Web</a></li>
		<li>
		
			<a href="http://www.facebook.com/sharer.php?u=<?php echo $lien;?>&title=<?php echo $titre;?>" target="_blank">
              <img alt='' src='<?=$this->Html->url('/');?>img/facebook_small.png'/>
            </a>
        </li>
        <li>
            <a href="http://twitter.com/share?url=<?php echo $lien;?>&title=<?php echo $titre;?>" target="_blank">
                <img alt='' src='<?=$this->Html->url('/');?>img/twitter_small.png'/>
            </a>
        </li>

        <li>
             <a href="http://digg.com/submit?phase=2&url=<?php echo $lien;?>&title=<?php echo $titre;?>" target="_blank">
               <img alt='' src='<?=$this->Html->url('/');?>img/digg_small.png'/>
             </a>
        </li>
             
      </ul>
    </div>
</div>
<?php 
}
endforeach; unset($post);
?>
<div style="clear:both;"></div>
</div>