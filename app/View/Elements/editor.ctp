<script type="text/javascript">
//<![CDATA[
//foreach textarea in form :)
	 $('textarea').each(
    function(){
        //alert($(this).attr('id'));
		var ck_ContentContent = CKEDITOR.replace($(this).attr('id'), {"customConfig":"\<?php echo $link?>\/js\/ckeditor\/app.config.js"});
	CKFinder.setupCKEditor(ck_ContentContent, '<?php echo $link?>/js/ckfinder/');
    }
);
//]]>
</script>