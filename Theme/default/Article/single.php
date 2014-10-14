<?php sk_template_part('header'); ?>



<div class="container">
    <div class="row">       



        <div class="col-sm-12   panel  panel-info">
            <h3><?php echo $article[0]["title"] ?></h3>
            <div class="panel-body">
                <?php echo html_entity_decode($article[0]["body"]) ?>
            </div>

        </div>   

     



<?php sk_template_comment($article[0]["id"]); ?>



    </div>




</div>
<input type="hidden" id='nav-current-index' value='0|-1'> 
<?php sk_template_part('footer'); ?>