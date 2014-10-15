<?php sk_template_part('header'); ?>

<div class="container">
    <div class="row">       
         <?php sk_template_articlelist($_GET['tag']); ?>
        <?php sk_template_part('sidebar'); ?>
       
       




</div>


<input type="hidden" id='nav-current-index' value='0|-1'> 
<?php sk_template_part('footer'); ?>
