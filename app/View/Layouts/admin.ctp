<?php
if($this->Session->read('Auth.User.id'))
{

$cakeDescription = __d('cake_dev', ' ');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>

	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	
	<?php
	echo $this->Html->meta('keywords', $this->fetch( 'head_keywords' ) );
	echo $this->Html->meta('description', $this->fetch( 'head_description' ) );
	
		 
		echo $this->Html->css('screen.css');  
		
		echo $this->Html->script('ckeditor/ckeditor');
		echo $this->Html->script('ckfinder/ckfinder');
		
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<?=$this->Html->script('ckeditor/ckeditor');?>
	<?=$this->Html->script('ckfinder/ckfinder');?>
 
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
 
	<link rel="stylesheet" href="<?=$this->Html->url('/css')?>/styles.css" type="text/css" />
	<link rel="stylesheet" href="<?=$this->Html->url('/css')?>/github.css" type="text/css" />
 
	<script src="<?=$this->Html->url('/js')?>/jquery.min.js"></script>
	
	
	<script src="<?=$this->Html->url('/js')?>/rainbow.min.js"></script>
	<script src="<?=$this->Html->url('/js')?>/scripts.js"></script>
	
 
</head>

<body class="home">
<?php echo $this->Element('adminheader');?>
<section id="mains">
<div class="inner clearfix">
<?php if(isset($current_icon)){ 
if($this->Session->read('lang')=='ar'){?>
<br>
<h4 style="text-align: right;background:#fff;padding: 5px 5px 5px 5px;box-shadow: 2px 2px 2px 2px #fff, 2px 1px 1px #000,3px 2px 1px #000,3px 3px 1px #000, 2px 2px 2px #000,2px 2px 2px #000;">
<a href="<?=$this->Html->url('/users/accueil')?>" style="color:black">الرئيسية <?php echo $this->Html->image('icons/application_home.png');?></a>
 <font color="red">=> </font>
<a href="<?=$this->Html->url('/').$current_controller?>" style="color:black"><?php echo $this->Html->image($current_icon)." ".$current_controllername;?></a>
 <font color="red">=> </font>
<a href="<?=$this->Html->url('/').$current_view?>" style="color:black"><?php echo $this->Html->image($current_iconview)." ".$current_iconviewname;?></a>
</h4>
<br>
<?php }else if($this->Session->read('lang')=='en'){ ?>
<h4 style="background:#fff;padding: 5px 5px 5px 5px;box-shadow: 2px 2px 2px 2px #fff, 2px 1px 1px #000,3px 2px 1px #000,3px 3px 1px #000, 2px 2px 2px #000,2px 2px 2px #000;">
<a href="<?=$this->Html->url('/users/accueil')?>" style="color:black"><?php echo $this->Html->image('icons/application_home.png');?> Home</a>
 <font color="red">=> </font>
<a href="<?=$this->Html->url('/').$current_controller?>" style="color:black"><?php echo $this->Html->image($current_icon)." ".$current_controllername;?></a>
 <font color="red">=> </font>
<a href="<?=$this->Html->url('/').$current_view?>" style="color:black"><?php echo $this->Html->image($current_iconview)." ".$current_iconviewname;?></a>
</h4>
<br>
<?php }else{ ?>
<br>
<h4 style="background:#fff;padding: 5px 5px 5px 5px;box-shadow: 2px 2px 2px 2px #fff, 2px 1px 1px #000,3px 2px 1px #000,3px 3px 1px #000, 2px 2px 2px #000,2px 2px 2px #000;">
<a href="<?=$this->Html->url('/users/accueil')?>" style="color:black"><?php echo $this->Html->image('icons/application_home.png');?> Accueil</a>
 <font color="red">=> </font>
<a href="<?=$this->Html->url('/').$current_controller?>" style="color:black"><?php echo $this->Html->image($current_icon)." ".$current_controllername;?></a>
 <font color="red">=> </font>
<a href="<?=$this->Html->url('/').$current_view?>" style="color:black"><?php echo $this->Html->image($current_iconview)." ".$current_iconviewname;?></a>
</h4>
<br>

<?php } }?>
<div align="center"><?php echo $this->Session->flash(); ?></div>
<?php echo $this->fetch('content'); ?>
<?php $line=$this->Html->url('/'); ?>
<script type="text/javascript">
//<![CDATA[
//foreach textarea in form :)
	 $('textarea').each(
    function(){
        //alert($(this).attr('id'));
		var ck_ContentContent = CKEDITOR.replace($(this).attr('id'), {"customConfig":"\/js\/ckeditor\/app.config.js"});
	//CKFinder.setupCKEditor(ck_ContentContent, '<?php echo $line; ?>/js/ckfinder/');
	CKFinder.setupCKEditor(ck_ContentContent, '<?php echo $line;?>js/ckfinder/');
    }
);
//]]>
</script> 
<script type="text/javascript">//<![CDATA[
function openFileBrowserSliderPhoto(){
var url = '<?php echo $line;?>js/ckfinder/ckfinder.html?type=Images&action=js&func=SetFileFieldSliderPhoto';
var sOptions = 'toolbar=no,status=no,resizable=yes,dependent=yes,scrollbars=yes,width=640,height=480';
var oWindow = window.open(url, 'ckfinder', sOptions);
}
function SetFileFieldSliderPhoto(fileUrl){
//var pos = fileUrl.toLowerCase().indexOf('webroot/img/finderimages');
//fileUrl = fileUrl.substr(pos + 21);
var lien=fileUrl
document.getElementById('SliderPhoto').value = lien;
}
function openFileBrowserSliderPhoto1(){
var url = '<?php echo $line;?>js/ckfinder/ckfinder.html?type=Images&action=js&func=SetFileFieldSliderPhoto1';
var sOptions = 'toolbar=no,status=no,resizable=yes,dependent=yes,scrollbars=yes,width=640,height=480';
var oWindow = window.open(url, 'ckfinder', sOptions);
}
function SetFileFieldSliderPhoto1(fileUrl){
//var pos = fileUrl.toLowerCase().indexOf('webroot/img/finderimages');
//fileUrl = fileUrl.substr(pos + 21);
var lien=fileUrl
document.getElementById('SliderPhoto1').value = lien;
}
function openFileBrowserSliderFile(){
var url = '<?php echo $line;?>js/ckfinder/ckfinder.html?type=Files&action=js&func=SetFileFieldSliderFile';
var sOptions = 'toolbar=no,status=no,resizable=yes,dependent=yes,scrollbars=yes,width=640,height=480';
var oWindow = window.open(url, 'ckfinder', sOptions);
}
function SetFileFieldSliderFile(fileUrl){
//var pos = fileUrl.toLowerCase().indexOf('webroot/img/finderimages');
//fileUrl = fileUrl.substr(pos + 21);
//var lien=<?php echo $line;?>+fileUrl
document.getElementById('SliderFile').value = fileUrl;
}
//]]>
</script>
</div>
</section>
	
<?php echo $this->Element('footer');?>
	<?php //echo $this->element('sql_dump'); ?>
 	
<script type="text/javascript" charset="utf-8">
$(function () 
{
	slate.init ();
	slate.portlet.init ();	
});
</script>
</body>
</html>
<?php } 
else{
?>
<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', ' ');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
 <meta http-equiv="content-type" content="text/html;charset=utf-8" /> 
<head>
	<?php   echo $this->Html->charset(); 
			echo $this->Html->meta('keywords', $this->fetch( 'head_keywords' ) );
			echo $this->Html->meta('description', $this->fetch( 'head_description' ) );
	?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	

	<link rel="stylesheet" href="<?=$this->Html->url('/css')?>/jquery.bxslider.css" type="text/css" />
	<link rel="stylesheet" href="<?=$this->Html->url('/css')?>/styles.css" type="text/css" />
	<link rel="stylesheet" href="<?=$this->Html->url('/css')?>/github.css" type="text/css" />
	<link rel="stylesheet" href="<?=$this->Html->url('/css')?>/stylo.css" type="text/css" />
 
	<script src="<?=$this->Html->url('/js')?>/jquery.min.js"></script>
	
	
	<script src="<?=$this->Html->url('/js')?>/jquery.bxslider.js"></script>
	<script src="<?=$this->Html->url('/js')?>/rainbow.min.js"></script>
	<script src="<?=$this->Html->url('/js')?>/scripts.js"></script>
 <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $config['Configuration']['analytics'];?>', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body class="home">
<?php echo $this->Element('header');?>
	<section id="main">
		<div class="inner clearfix">
<div align="center"><?php echo $this->Session->flash(); ?></div>
<?php echo $this->fetch('content'); ?>

</div>
	</section>
<?php echo $this->Element('footer');?>
	<?php //echo $this->element('sql_dump'); ?>

</body>
</html>

<?php } ?>
