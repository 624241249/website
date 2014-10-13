<div class="col-sm-12   panel  panel-info" id="comment">
    <h3>评论</h3>
    <div class="panel-body">
        <form class="form-horizontal" id="comment_form"  method="post"  action="/?m=comment&a=index" role="form">
            <input type='hidden' name='articleid' value='<?php echo $articleid ?>'>
            <input type='hidden' id="commentid" name='commentid' value='0'>
            <div id="form_check_message"></div>
 
            <div class="form-group">
                <label  class="col-sm-2 control-label">UserName</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" placeholder="UserName">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                </div>
            </div>
            <div class="form-group">
                <label   class="col-sm-2 control-label">Web</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="website" id="website" placeholder="web url">
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">Comment</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="comment_content" id="comment_content" rows="10"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>



        <div class="panel">
            <?php
            comment_html($comments);

            function comment_html($comments, $level = 0) {
                ?>

                <?php
                foreach ($comments as $key => $comment) {
                    ?>
                    <?php
                    // $margin = $level * 30;
                    // if($level%2 == 0){
                    $html = "style='background-color:#fffeee'";
                    // }
                    ?>
                    <div class="panel panel-body  panel-default" <?php echo $html ?>>



                        <?php
                        if (is_array($comment['childs'])) {

                            comment_html($comment['childs'], $level + 1);
                        }
                        ?> 

                        <div class="panel-title"><a href="<?php echo $comment['website'] ?>" ><?php echo $comment['username'] ?></a><span style="float:right"><?php echo $level + 1 ?>楼</span></div>
                        <div class="col-sm-12 "><?php echo $comment['content'] ?> </div>


                        <div class="col-sm-2 col-md-offset-11"><a href="javascript:huifu('<?php echo $comment['username'] ?>','<?php echo $comment['id'] ?>')">回复</a></div>




                    </div>   




                    <?php
                }
            }
            ?>
        </div>
    </div>


</div> 

<script>
    function huifu(name, commentid) {
        $("#comment_content").val("回复 " + name + "    ");
        $("#commentid").val(commentid);
        $("html,body").animate({scrollTop: $("#comment").offset().top}, 1000);
        $("#comment_content").focus();

    }

    $(function() {
        $("#comment_form").submit(function() {
            var issubmit = true;
            var username = $("#username").val();
            var email = $("#email").val();
            var comment_content = $("#comment_content").val();
            var message = "";
            if (username == "" || username == undefined) {
                message += "<div class='alert alert-warning' role='alert'>用户名不能为空</div>";
                issubmit = false;
            }

            if (email == "" || email == undefined) {
                message +="<div class='alert alert-warning' role='alert'>邮箱不能为空</div>";
                issubmit = false;
            }
            if (comment_content == "" || comment_content == undefined) {
//                $("#form_check_message").addClass("alert alert-warning").html("");
                message += "<div class='alert alert-warning' role='alert'>评论不能为空</div>";
                issubmit = false;
            }

            if (!issubmit) {
                 $("#form_check_message").html(message);
                $("html,body").animate({scrollTop: $("#comment").offset().top}, 1000);
            }
            
            return issubmit;
        });
    });
</script>
