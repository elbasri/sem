			<h1 style="font-size: 2.25em;"><?php if(!empty($config['Configuration']['desc'])){
				if($this->Session->read('lang')=='ar')
					echo $config['Configuration']['descar'];
				else if($this->Session->read('lang')=='en')
					echo $config['Configuration']['descen'];
				else
					echo $config['Configuration']['desc'];
			}?></h1>
<ul class="bxslider">
<?php 
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
}
$domain = "http://".$_SERVER['SERVER_NAME'];
foreach($consultationfooter as $post) : 
//if($post['Consultation']['etat']!=0){
$id=$post['Consultation']['id'];
$titre=Inflector::slug($post['Consultation']['titre'],$replacement ='_');
	$image=$post['Consultation']['img'];
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
	*/
?>
  <li><img src="<?=$this->Html->url('/img/images/')?>slide.jpg" /></li>
  <li><img src="<?=$this->Html->url('/img/images/')?>slide.jpg" /></li>
<?php //} endforeach ; ?>
</ul>
