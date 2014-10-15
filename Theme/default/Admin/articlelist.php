 
            
            <?php
                foreach ($article as $key => $value) {
                    ?>
                    <div class="col-sm-12   panel  panel-info">
                        <h3><a href="<?php echo U("Article/index/single?id=".$value['id']);?>"><?php echo $value["title"] ?></a></h3>
                        <div class="panel-body">
                            <?php echo $value["summary"] ?>
                        </div>
                        <div class="row panel-body">
                            <div class="col-sm-3 "> <?php echo $value["created"] ?></div>
                           
                            <div class="col-sm-2 col-md-offset-7"><a onClick="" href="<?php echo U("Admin/index/edit?id=".$value['id']);?>" class="btn btn-primary" role="button">编辑</a><a href="<?php echo U("Admin/index/delete?id=".$value['id']);?>"  class="btn btn-primary " role="button"  onclick="{if(confirm('确定要删除吗?')){return true;}return false;}">删除</a></div>
           
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
 <div class="col-md-3 col-md-offset-5"><?php echo $page?></div>
            <input type="hidden" id='nav-current-index' value='4|0'> 
          
            
 