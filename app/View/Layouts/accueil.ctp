<?php
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
	<link rel="stylesheet" href="<?=$this->Html->url('/css')?>/jquery.bxslider.css" type="text/css" />
	<link rel="stylesheet" href="<?=$this->Html->url('/css')?>/styles.css" type="text/css" /> 
 
 
	
<script type="text/javascript">//<![CDATA[
function openFileBrowserSliderPhoto(){
var url = '<?php echo $line;?>js/ckfinder/ckfinder.html?type=Images&action=js&func=SetFileFieldSliderPhoto';
var sOptions = 'toolbar=no,status=no,resizable=yes,dependent=yes,scrollbars=yes,width=640,height=480';
var oWindow = window.open(url, 'ckfinder', sOptions);
}
function SetFileFieldSliderPhoto(fileUrl){
//var pos = fileUrl.toLowerCase().indexOf('webroot/img/finderimages');
//fileUrl = fileUrl.substr(pos + 21);
//var lien=<?php echo $line;?>+fileUrl
document.getElementById('SliderPhoto').value = fileUrl;
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

	   
	   
</head>

<body class="home">
<?php echo $this->Element('adminheader');?>
<div align="center"><?php echo $this->Session->flash(); ?></div>
<section id="mains">
<div class="inner clearfix">
<?php echo $this->fetch('content'); ?>
<?php $line=$this->Html->url('/'); ?>
<script type="text/javascript">
//<![CDATA[
//foreach textarea in form :)
	 $('textarea').each(
    function(){
        //alert($(this).attr('id'));
		var ck_ContentContent = CKEDITOR.replace($(this).attr('id'), {"customConfig":"\/js\/ckeditor\/app.config.js"});
	CKFinder.setupCKEditor(ck_ContentContent, '<?php echo $line; ?>js/ckfinder/');
    }
);
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
