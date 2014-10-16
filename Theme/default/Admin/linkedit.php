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

            <form class="form-horizontal" id="comment_form"  method="post"  action="<?php echo U("Admin/index/linksave");?>" role="form">
                <input type='hidden' name='id' value='<?php echo $link[0]['id'] ?>'>
                <div id="form_check_message"></div>

                <div class="form-group">
                    <label  class="col-sm-2 control-label">WebName</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?php echo $link[0]['name'] ?>">
                    </div>
                </div>
 
                <div class="form-group">
                    <label   class="col-sm-2 control-label">WebUrl</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="weburl" id="weburl" placeholder="" value="<?php echo $link[0]['weburl'] ?>">
                    </div>
                </div>

              
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>



        </div>
    </div>






</div>
<input type="hidden" id='nav-current-index' value='4|2'> 


<?php sk_template_part('footer'); ?>


