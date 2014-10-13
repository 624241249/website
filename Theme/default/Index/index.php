<?php sk_template_part('header'); ?>

<div class="container">
    <div class="row">       
        <div class="col-sm-8 ">

               <?php 
                  foreach ($articles as $key => $value) {
                      ?>
            <div class="col-sm-12   panel  panel-info">
                <h3><a href="<?php echo sk_site_url()?>/?m=article&a=single&id=<?php echo $value['id']?>"><?php echo $value["title"]?></a></h3>
                <div class="panel-body">
                   <?php echo $value["summary"]?>
                </div>
                <div class="row panel-body">
                    <div class="col-sm-3 "> <?php echo $value["created"]?></div>
                    <div class="col-sm-5 "><?php foreach (explode(",",$value["tag"]) as $key=>$tag){
                        echo " <a href='".  sk_site_url()."/?m=article&a=tag&tag=".$tag."'>#".$tag."</a>   ";
                    }  ?> </div>
                    <div class="col-sm-2 "><a href="<?php echo sk_site_url()?>/?m=article&a=single&id=<?php echo $value['id'];?>">阅读全文</a></div>
                    <div class="col-sm-2 "><a href="#">评论 <span class="badge">4</span></a></div>
                </div>
            </div>   
            <?php 
                }
            ?>
            




        </div>
        <?php sk_template_part('sidebar'); ?>
       
       




</div>


<input type="hidden" id='nav-current-index' value='0|-1'> 
<?php sk_template_part('footer'); ?>
