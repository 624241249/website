<?php sk_template_part('header'); ?>

<div class="container">
    <div class="row">       
      

               <?php 
                  foreach ($article as $key => $value) {
                      ?>
            <div class="col-sm-12   panel  panel-info">
                <h3><?php echo $value["title"]?></h3>
                <div class="panel-body">
                   <?php echo $value["body"]?>
                </div>
<!--                <div class="row panel-body">
                    <div class="col-sm-3 "> <?php echo $value["created"]?></div>
                    <div class="col-sm-5 "><?php foreach ($value["tag"] as $key=>$value){
                        echo " <a href='#'>#".$value."</a>   ";
                    }  ?> </div>
                    <div class="col-sm-2 "><a href="#">阅读全文</a></div>
                    <div class="col-sm-2 "><a href="#">评论 <span class="badge">4</span></a></div>
                </div>-->
            </div>   
            <?php 
                }
            ?>
            




       
    </div>




</div>
<input type="hidden" id='nav-current-index' value='3|-1'> 
<?php sk_template_part('footer'); ?>