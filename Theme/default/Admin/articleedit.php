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

            <form class="form-horizontal" id="comment_form"  method="post"  action="/?m=admin&a=save" role="form">
                <input type='hidden' name='articleid' value='<?php echo $article[0]['id'] ?>'>
                <div id="form_check_message"></div>

                <div class="form-group">
                    <label  class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo $article[0]["title"] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="type" name='type'>
                            <option value="article">article</option>
                            <option value="about">about</option>
                            <option>about</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Summary</label>
                    <div class="col-sm-10"> 
                        <textarea class="form-control" name="summary" id="summary" rows="10"><?php echo $article[0]['summary'] ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label   class="col-sm-2 control-label">Tag</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tag" id="tag" placeholder="Tag 多个使用','分割" value="<?php echo $article[0]['tag'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-2 control-label">Body</label>
                    <div class="col-sm-10">
                        <!--<textarea class="form-control" name="body" id="body" rows="10"><?php echo $article[0]['body'] ?></textarea>-->
                        <script id="body" name="body" type="text/plain">
                            <?php echo html_entity_decode($article[0]["body"]) ?>
                        </script>
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
<input type="hidden" id='nav-current-index' value='4|0'> 


<?php sk_template_part('footer'); ?>


