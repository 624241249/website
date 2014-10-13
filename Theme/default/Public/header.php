<!DOCTYPE html>
<html>
    <head>
        <title><?php echo sk_title() ?></title>

        <link rel="stylesheet" href="<?php echo sk_theme_url(); ?>/css/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo sk_theme_url(); ?>/css/style.css">
        <script src="<?php echo sk_theme_url(); ?>/js/jquery.min.js"></script>
        <script src="<?php echo sk_theme_url(); ?>/js/jquery.animate-colors-min.js"></script>
        <script src="<?php echo sk_theme_url(); ?>/css/bootstrap/dist/js/bootstrap.js"></script>
    </head>
    <body>
 
        <nav class="navbar navbar-default content  navbar-inverse " role="navigation">

            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo sk_site_url()?>/">SK</a>
                </div>
                <ul class="nav navbar-nav ">
                   
                    <li><a href="<?php echo sk_site_url()?>/?m=article&a=index">文章</a></li>
                    <li><a href="<?php echo sk_site_url()?>/?m=article&a=index">实验室</a></li>
                     <li><a href="https://github.com/aikangs" target="_blank">GitHub</a></li>
                      <li> <a href='<?php echo sk_site_url()?>/?m=page&a=index&tag=about'>关于</a></li>
<!--                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            更多
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="https://github.com/aikangs" target="_blank">GitHub</a></li>
                            <li><a href="#">Google</a></li>
                                           <li><a href="#"></a></li>
                            <li class="divider"></li>
                            <li> <a href='/?m=page&a=index&tag=about'>关于</a></li>
                            <li><a href="#">联系</a></li>

                        </ul>
                    </li>-->
                </ul>
            </div>
        </nav> 
<div class="actGotop"><a href="javascript:;" title="Top"></a></div>
        <script type="text/javascript">
            $(function() {
                var strs = new Array();
                var val = $("#nav-current-index").val();
                if (val != null) {
                    strs = val.split("|");//将它分割成数租


                    $(".navbar-nav > li").eq(strs[0]).addClass("active");
                    if (strs[1] != -1) {
                        $(".navbar-nav > li").eq(3).find("li").eq(strs[1]).addClass("active");
                    }
                }

            });
        </script>
        
        <script type="text/javascript">
$(function(){	
    console.log("asd");
	$(window).scroll(function() {		
		if($(window).scrollTop() >= 100){
			$('.actGotop').fadeIn(300); 
		}else{    
			$('.actGotop').fadeOut(300);    
		}  
	});
	$('.actGotop').click(function(){$('html,body').animate({scrollTop: '0px'}, 800);});	
});
</script>