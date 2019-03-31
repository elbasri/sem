<div align="center" style="background:#000000;border:1px #fff solid">
<?php 
if($this->Session->read('lang')=='ar')
	echo $this->Html->image('images/404ar.png',array('alt'=>'هذه الصفحة غير موجودة','title'=>'هذه الصفحة غير موجودة'));
else if($this->Session->read('lang')=='en')
	echo $this->Html->image('images/404en.png',array('alt'=>'This page does not exist','title'=>'This page does not exist'));
else
	echo $this->Html->image('images/404.png',array('alt'=>'cette page n\'existe plus','title'=>'cette page n\'existe plus'));

?>
</div>