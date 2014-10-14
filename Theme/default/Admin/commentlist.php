<?php sk_template_part('header'); ?>
<!-- 加载编辑器的容器 -->

<!-- 配置文件 -->
<script type="text/javascript" src="<?php echo sk_theme_url(); ?>/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="<?php echo sk_theme_url(); ?>/ueditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('body');
</script>
<div class="container">
    <div class="row">       
        <div class="col-md-2">
            <?php echo W("Admin/Public/admin_nav"); ?>
        </div>

        <div class="col-md-10">

              <?php
                foreach ($comments as $key => $value) {
                    ?>
                    <div class="col-sm-12   panel  panel-info">
                        <h3><a href="<?php echo $value['website'] ?>"><?php echo $value["username"] ?></a> --<?php echo $value["email"] ?></h3>
                        <div class="panel-body">
                            <?php echo $value["content"] ?>
                        </div>
                        <div class="row panel-body">
                            <div class="col-sm-3 "> </div>
                           
                            <div class="col-sm-2 col-md-offset-7"><a onClick="" href="<?php echo sk_site_url()?>/?m=article&a=single&id=<?php echo $value['articleid']?>#comment" class="btn btn-primary" role="button">回复</a><a href="<?php echo sk_site_url()?>/?m=admin&a=comment_delete&id=<?php echo $value['id']?>"  class="btn btn-primary " role="button"  onclick="{if(confirm('确定要删除吗?')){return true;}return false;}">删除</a></div>
           
                        </div>
                    </div> 
            
            
<!--              <div class="list-group">
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading"><?php echo $value["title"] ?></h4>
                    <p class="list-group-item-text"> <?php echo $value["summary"] ?></p>
                </a>
            </div>-->
                    <?php
                }
                ?>


        </div>
    </div>






</div>
<input type="hidden" id='nav-current-index' value='4|1'> 


<?php sk_template_part('footer'); ?>


