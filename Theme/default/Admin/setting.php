<?php sk_template_part('header'); ?>

<div class="container">
    <div class="row">       
        <div class="col-md-2">
            <?php echo W("Admin/Public/admin_nav"); ?>
        </div>

        <div class="col-md-10">

            <form class="form-horizontal" id="comment_form"  method="post"  action="<?php echo U('admin/index/setting_save?key=' . $_GET['key']); ?>" role="form">

                <div id="form_check_message"></div>



                <div class="form-group">
                    <label  class="col-sm-2 control-label">Meta</label>
                    <div class="col-sm-10">
<!--                        <select class="form-control" id="type" name='type'>
                            <option value="site_title">网站标题</option>
                            <option value="site_keywords">网站关键字</option>
                            <option value="site_description">网站描述</option>
                            <option>about</option>
                        </select>-->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <?php
                                $key = $_GET['key'];
                                 
                                if ($key == "") {
                                    echo "请选择";
                                } elseif ($key == "site_title") {
                                    echo "网站标题";
                                } elseif ($key == "site_keywords") {
                                    echo "网站关键字";
                                } elseif ($key == "site_description") {
                                    echo "网站描述";
                                }
                                ?> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li <?php if ($_GET['key'] == "site_title") {
                                    echo "class='active'";
                                } ?>><a href="<?php echo U('admin/index/setting?key=site_title'); ?>">网站标题</a></li>
                                <li <?php if ($_GET['key'] == "site_keywords") {
                                    echo "class='active'";
                                } ?>><a href="<?php echo U('admin/index/setting?key=site_keywords'); ?>">网站关键字</a></li>
                                <li <?php if ($_GET['key'] == "site_description") {
                                    echo "class='active'";
                                } ?>><a href="<?php echo U('admin/index/setting?key=site_description'); ?>">网站描述</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label   class="col-sm-2 control-label">值</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="value" id="value" rows="10"><?php echo $value ?></textarea>
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


