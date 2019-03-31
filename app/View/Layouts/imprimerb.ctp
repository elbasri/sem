<?php
$cakeDescription = __d('cake_dev', ' ');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>

	<?php   echo $this->Html->charset(); 
			echo $this->Html->meta('keywords', $this->fetch( 'head_keywords' ) );
			echo $this->Html->meta('description', $this->fetch( 'head_description' ) );
	?>
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
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $config['Configuration']['analytics'];?>', 'auto');
  ga('send', 'pageview');

</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-59421226-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body class="home">
<?php echo $this->Element('imprimerbheader');?>
<?php echo $this->Session->flash(); ?>
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
	CKFinder.setupCKEditor(ck_ContentContent, '<?php echo $line; ?>/js/ckfinder/');
    }
);
//]]>
</script> 
</div>
</section>
	
<?php echo $this->Element('imprimerbfooter');?>
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
