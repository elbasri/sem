<?php
if(substr($post['Service']['image'], 0, 4)!=="http"){
	   if(substr($post['Service']['image'], 0, 1)=="/")
			echo $image = substr($image, 1);
		if (!file_exists($image))
			$image=$this->Html->url('/')."img/images/slider.jpg";
		else
			$image=$domain.$this->Html->url('/').$image;
	}
	else{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$image);
		// don't download content
		curl_setopt($ch, CURLOPT_NOBODY, 1);
		curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		if(curl_exec($ch)==FALSE)
		{
			$image=$this->Html->url('/')."img/images/slider.jpg";
		}
		
	}
?>