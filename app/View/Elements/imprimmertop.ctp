<div class="logo" style="line-height: 50%;">

<?php if($this->Session->read('lang')=='ar'){ ?>
  <a href="<?=$this->Html->url('/')?>" class="font14" ><img src="<?php echo $config['Configuration']['logo'];?>" width="45" height="20" /><?php echo $config['Configuration']['titrear']; ?><?php echo "<br><font size='2'>".$config['Configuration']['adressear']."<br>".$config['Configuration']['codep']." - ".$config['Configuration']['villear']." - ".$config['Configuration']['paysar']."</font>";?></a>
			
<?php } else if($this->Session->read('lang')=='en'){ ?>
  <a href="<?=$this->Html->url('/')?>" class="font14" ><img src="<?php echo $config['Configuration']['logo'];?>" width="45" height="20" /><?php echo $config['Configuration']['titreen']; ?><?php echo "<br><font size='2'>".$config['Configuration']['adresseen']."<br>".$config['Configuration']['codep']." - ".$config['Configuration']['villeen']." - ".$config['Configuration']['paysen']."</font>";?></a>
			
<?php }else{ ?>
  <a href="<?=$this->Html->url('/')?>" ><img src="<?php echo $config['Configuration']['logo'];?>" width="45" height="30" style="float:left"/> <font size="3" style="float:left;margin-left:5px">Ministère de la Santé<br/><?php echo $config['Configuration']['titre']; ?></font></a>
			
<?php } ?>
</div>
