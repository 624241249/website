<!DOCTYPE html>
<html>
    <head>
        <title><?php echo sk_title() ?></title>
<?php echo sk_meta_seo();?>
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
                   
                    <li><a href="<?php echo U("Article/index/index");?>">文章</a></li>
                    <li><a href="<?php echo U("Experiment/index/index");?>">实验室</a></li>
                     <li><a href="https://github.com/aikangs" target="_blank">GitHub</a></li>
                      <li> <a href='<?php echo U("Page/index/index?tag=about");?>'>关于</a></li>
                        <li> <a href='<?php echo U("Admin/index/index");?>'>管理</a></li>
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
        <div class="bbg">
	<div id="popo1" class="popo" style="height: 150px; width: 150px;; left:0;top:0;"></div>
	<div id="popo2" class="popo" style="height: 180px; width: 180px; right:0;bottom:0;"></div>
	<div id="popo3" class="popo" style="height: 90px; width: 90px; right:0;top:0;"></div>
	<div id="popo4" class="popo" style="height: 100px; width: 100px; left:0;bottom:0;"></div>
	<div id="popo5" class="popo" style="height: 82px; width: 82px; left:50%;top:50%;"></div>
	<div id="popo6" class="popo" style="height: 140px; width: 140px; left:0;top:50%;"></div>
	<div id="popo7" class="popo" style="height: 94px; width: 94px; right:0;top:50%;"></div>
	<div id="popo8" class="popo" style="height: 120px; width: 120px; left:50%;top:0;"></div>
	<div id="popo9" class="popo" style="height: 174px; width: 174px; left:50%;bottom:0;"></div>
	
	<div id="popo10" class="popo" style="height: 116px; width: 116px; left:25%;top:25%;"></div>
	<div id="popo11" class="popo" style="height: 140px; width: 140px; left:25%;bottom:25%;"></div>
	<div id="popo12" class="popo" style="height: 160px; width: 160px; right:25%;top:25%;"></div>
	<div id="popo13" class="popo" style="height: 120px; width: 120px; right:25%;bottom:25%;"></div>
	<div id="popo14" class="popo" style="height: 174px; width: 174px; left:25%;top:50%;"></div>
	<div id="popo15" class="popo" style="height: 116px; width: 116px; right:25%;top:50%;"></div>
	<div id="popo16" class="popo" style="height: 140px; width: 140px; left:50%;top:25%;"></div>
	<div id="popo17" class="popo" style="height: 100px; width: 100px; left:50%;bottom:25%;"></div>
</div>

<div class="actGotop"><a href="javascript:;" title="Top"></a></div>
        <script type="text/javascript">
            $(function() {
                var strs = new Array();
                var val = $("#nav-current-index").val();
                if (val != null) {
                    strs = val.split("|");//将它分割成数租


                    $(".navbar-nav > li").eq(strs[0]).addClass("active");
                   
                    if (strs[1] != -1) {
                    $("#admin-nav > li").eq(strs[1]).addClass("active");
                    }
                }

            });
        </script>
        
        <script type="text/javascript">
$(function(){	
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