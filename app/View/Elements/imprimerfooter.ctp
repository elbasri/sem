<?php if(isset($footersign) and $footersign==1){ ?>
<table style="text-align:center">
<tr>
<td style="width:500px">Délégation <strong></strong></td>
<td style="width:50%">Distinataire <strong></strong></td>
</tr>
</table><br/><br/><br/><br/><br/><br/>
<?php } ?>
<footer><div class="inner clearfix" align="center">
<p align="center" >
<?php 
if($this->Session->read('lang')=='ar'){ 
echo "<font size='2'>".$config['Configuration']['titrear']."</font>"; if(!empty($config['Configuration']['desc']))echo "<br><font size='2'>".$config['Configuration']['descar']."</font>";
 $domain = "http://".$_SERVER['SERVER_NAME']; 
 echo "<br><font size='2'>"; 
 echo $domain;
 echo " - ".$config['Configuration']['tel'];
 if(!empty($config['Configuration']['fax']))echo " - ".$config['Configuration']['fax'];
 if(!empty($config['Configuration']['email']))echo " - ".$config['Configuration']['email']." </font>";
}

else if($this->Session->read('lang')=='en'){ 
echo "<font size='2'>".$config['Configuration']['titreen']."</font>"; if(!empty($config['Configuration']['desc']))echo "<br><font size='2'>".$config['Configuration']['descen']."</font>";
 $domain = "http://".$_SERVER['SERVER_NAME']; echo "<br><font size='2'>Tél: ".$config['Configuration']['tel']; if(!empty($config['Configuration']['fax']))echo " - Fax: ".$config['Configuration']['fax']; if(!empty($config['Configuration']['email']))echo " - Email: ".$config['Configuration']['email']; echo " - Website: ".$domain."</font>";
}

else{
echo "<font size='2'>".$config['Configuration']['titre']."</font>"; if(!empty($config['Configuration']['desc']))echo "<br><font size='2'>".$config['Configuration']['desc']."</font>";
 $domain = "http://".$_SERVER['SERVER_NAME']; echo "<br><font size='2'>Tél1: ".$config['Configuration']['tel']; if(!empty($config['Configuration']['fax']))echo " - Tél2: ".$config['Configuration']['tel2']." - Fax: ".$config['Configuration']['fax']."</font>";
}
?>
</p></div></footer>
