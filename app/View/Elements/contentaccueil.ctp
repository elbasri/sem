<div class="recruterdiv2" align="center" style="margin-left:20px">
<?php 
$domain = "http://".$_SERVER['SERVER_NAME'];
/*
function checkRemoteFile($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    // don't download content
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if(curl_exec($ch)!==FALSE)
    {
        return true;
    }
    else
    {
        return false;
    }
}*/
foreach($services as $post):
if($post['Service']['etat']=='1'){




   $titre=$post['Service']['titre'];
   $lien=$domain.$this->Html->url('/')."services/voir/".$post['Service']['id']."/".Inflector::slug($post['Service']['titre'],$replacement ='_');
   
   $image=$post['Service']['image'];
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
<div class="product">
<!--image_non_disponible.jpeg-->
  <img class="product-img" src="<?php echo $image ;?>" alt="<?php echo $post['Service']['titre'];?>"/>
  <div class="product-actions">
    <div class="product-info">
      <div class="sale-tile">
        <div class="sale"><strong>
		<?php 
			if($this->Session->read('lang')=='ar'){
				echo "خدمة";
			}
			else if($this->Session->read('lang')=='en'){
				echo "Service";
			}
			else{
				echo "Service";
			}
		?>
		</strong></div>
      </div>   
      <div class="info-block">  
        <div class="product-title"><?php echo $this->Html->link(substr($post['Service']['titre'], 0, 35),array('controller'=>'services','action'=>'voir',$post['Service']['id'],Inflector::slug($post['Service']['titre'],$replacement ='_')),array('title'=>$post['Service']['titre']));?></div>
        <div class="product-description" ><?php //echo substr($post['Service']['desc'], 0, 100);?></div>
        <div class="product-sale"><?php 
		if(!empty($post['Service']['prix'])){
		echo "<br>".$post['Service']['prix']; echo " ".$config['Configuration']['Devises']; }?></div>
        <div class="product-prize"><?php //echo $post['Service']['remise'];?> </div>
        <div class="button-buy"><?php echo $this->Html->link('Demande de devis',array('controller'=>'demandes','action'=>'nouvelledemande','service',$post['Service']['id']),array('style'=>'color:#ffffff'));?></div>
        <div class="add"><?php echo $this->Html->link('Info',array('controller'=>'services','action'=>'voir',$post['Service']['id'],Inflector::slug($post['Service']['titre'],$replacement ='_')),array('style'=>'color:#ffffff'));?></div>
      </div>
    </div>
  </div> 
    <div class="nav" align="left">
      <ul>
        <li><a href="<?php echo $lien;?>"><?php 
			if($this->Session->read('lang')=='ar'){
				echo "المزيد";
			}
			else if($this->Session->read('lang')=='en'){
				echo "Info";
			}
			else{
				echo "Info";
			}
		?></a></li>
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

foreach($produits as $post): 
if($post['Produit']['etat']=='1'){
      $image=$post['Produit']['image'];
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
  <img class="product-img" src="<?php echo $image;?>" alt="<?php echo $post['Produit']['titre'];?>"/>
  <div class="product-actions">
    <div class="product-info">
      <div class="sale-tile">
        <div class="sale"><strong><?php 
			if($this->Session->read('lang')=='ar'){
				echo "منتج";
			}
			else if($this->Session->read('lang')=='en'){
				echo "Product";
			}
			else{
				echo "Produit";
			}
		?></strong></div>
      </div>   
      <div class="info-block">  
        <div class="product-title"><?php echo $this->Html->link(substr($post['Produit']['titre'], 0, 35),array('controller'=>'produits','action'=>'voir',$post['Produit']['id'],Inflector::slug($post['Produit']['titre'],$replacement ='_')),array('title'=>$post['Produit']['titre']));?></div>
        <div class="product-description" ><?php //echo substr($post['Produit']['desc'], 0, 100);?></div>
        <div class="product-sale"><?php 
		if(!empty($post['Produit']['prix'])){
		echo "<br>".$post['Produit']['prix']; echo " ".$config['Configuration']['Devises']; }?></div>
        <div class="product-prize"><?php //echo $post['Produit']['remise'];?> </div>
        <div class="button-buy"><?php echo $this->Html->link('Commander',array('controller'=>'demandes','action'=>'nouvelledemande','produit',$post['Produit']['id']),array('style'=>'color:#ffffff'));?></div>
        <div class="add"><?php echo $this->Html->link('Info',array('controller'=>'produits','action'=>'voir',$post['Produit']['id'],Inflector::slug($post['Produit']['titre'],$replacement ='_')),array('style'=>'color:#ffffff'));?></div>
      </div>
    </div>
  </div>
  <?php 
   $titre=$post['Produit']['titre'];
   $lien=$domain.$this->Html->url('/')."produits/voir/".$post['Produit']['id']."/".Inflector::slug($post['Produit']['titre'],$replacement ='_');
  ?> 
    <div class="nav" align="left">
      <ul>
        <li><a href="<?php echo $lien;?>"><?php 
			if($this->Session->read('lang')=='ar'){
				echo "المزيد";
			}
			else if($this->Session->read('lang')=='en'){
				echo "Info";
			}
			else{
				echo "Info";
			}
		?></a></li>
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