<?php sk_template_part('header'); ?>
<style>

</style>
<div class="container">
    <div class="row">       
        

        <div class="col-md-12">
           
             <div class="panel panel-default">
  <div class="panel-heading text-center"><h3>登录</h3></div>
  <div class="panel-body">
    <form class="form-horizontal" id="comment_form"  method="post"  action="<?php echo U("Admin/index/login");?>" role="form">
                <input type='hidden' name='articleid' value='<?php echo $article[0]['id'] ?>'>
                <div id="form_check_message"></div>

                <div class="form-group">
                    <label  class="col-sm-2 control-label">UserName</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="UserName">
                    </div>
                </div>

                
                <div class="form-group">
                    <label class="col-sm-2 control-label">PassWord</label>
                    <div class="col-sm-10"> 
                         <input type="password" class="form-control" id="user_password" name="user_password" placeholder="PassWord"> 
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
    </div>






</div>
<input type="hidden" id='nav-current-index' value='4|-1'> 


<?php sk_template_part('footer'); ?>


