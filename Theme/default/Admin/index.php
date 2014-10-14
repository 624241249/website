<?php sk_template_part('header'); ?>
<style>

</style>
<div class="container">
    <div class="row">       
        <div class="col-md-2">


            <?php echo W("Admin/Public/admin_nav");?>
        </div>

        <div class="col-md-10">
            <div class="col-md-3 col-md-offset-10"><a href="<?php echo sk_site_url()?>/?m=admin&a=add" class="btn btn-primary" role="button">添加文章</a></div>
             <?php echo W("Admin/Public/admin_articlelist");?>
            
          
            

        </div>
    </div>






</div> 


<?php sk_template_part('footer'); ?>


