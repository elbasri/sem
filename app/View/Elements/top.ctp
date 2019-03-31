<div class="inner clearfix"><div class="logo">
  <!--<a href="<?=$this->Html->url('/')?>" target="_blank"><span class="icon-icomoon-bx-star"></span>SGE</a>-->
<?php if($this->Session->read('lang')=='ar'){ ?>
  <a href="<?=$this->Html->url('/')?>" class="font14" ><img src="<?=$this->Html->url('/')?><?php echo $config['Configuration']['logo'];?>" width="35" height="20" /><?php echo $config['Configuration']['titrear']; ?></a>
			
<?php } else if($this->Session->read('lang')=='en'){ ?>
  <a href="<?=$this->Html->url('/')?>" class="font14" ><img src="<?=$this->Html->url('/')?><?php echo $config['Configuration']['logo'];?>" width="45" height="20" /><?php echo $config['Configuration']['titreen']; ?></a>
			
<?php }else{ ?>
  <a href="<?=$this->Html->url('/')?>" class="font14" ><img src="<?=$this->Html->url('/')?><?php echo $config['Configuration']['logo'];?>" width="20" height="15" /><?php echo $config['Configuration']['titre']; ?></a>
			
<?php } ?>
</div>
