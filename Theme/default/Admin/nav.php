 



<ul class="nav nav-pills nav-stacked" id="admin-nav" role="tablist">
    <!--<li role="presentation" ><a href="<?php echo sk_site_url() ?>/?m=admin&a=index">我的文章</a></li>-->
    <li class="dropdown nav-stacked">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">我的文章<b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo U("Admin/index/index");?>" >所有文章</a></li>
            <li><a href="<?php echo U("Admin/index/add");?>">添加文章</a></li>

        </ul>
    </li>
    <li role="presentation"><a href="<?php echo U("Admin/index/comments");?>">评论</a></li>
    
    <li role="presentation"><a href="<?php echo U('Admin/index/setting');?>">系统设置</a></li>
    <li role="presentation"><a href="<?php echo U("Admin/index/loginOut");?>"  onclick="{
                if (confirm('确定退出?')) {
                    return true;
                }
                return false;
            }">退出登陆</a></li>
</ul>





