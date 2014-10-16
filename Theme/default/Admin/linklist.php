 <?php sk_template_part('header'); ?>
        <div class="container">
    <div class="row">       
        <div class="col-md-2">
            <?php echo W("Admin/Public/admin_nav"); ?>
        </div>

        <div class="col-md-10">

             <?php
                foreach ($link as $key => $value) {
                    ?>
                    <div class="col-sm-12   panel  panel-info">
                        <h3><a href="<?php echo $value["weburl"] ?>" target="_blank"><?php echo $value["name"] ?></a></h3>
                        
                         
                           
                            <div class="col-sm-2 col-md-offset-7"><a onClick="" href="<?php echo U("Admin/index/linkedit?id=".$value['id']);?>" class="btn btn-primary" role="button">编辑</a><a href="<?php echo U("Admin/index/linkdelete?id=".$value['id']);?>"  class="btn btn-primary " role="button"  onclick="{if(confirm('确定要删除吗?')){return true;}return false;}">删除</a></div>
            
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
<input type="hidden" id='nav-current-index' value='4|2'>      
          
            
 