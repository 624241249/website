<div class="col-sm-4 ">
    <div class="col-sm-12   panel  panel-info">
        <h3>我的微信<?php echo $nav_index ?></h3>
        <div class="panel-body">
            <img width=276 height=330 src="<?php echo sk_theme_url(); ?>/image/weixin-qrcode-2.png"/>
        </div>
    </div>   

    <div class="col-sm-12   panel  panel-info">
        <h3>相关标签</h3>
        <div class="panel-body tags" >
            <?php
            foreach ($tags as $key => $tag) {
                echo " <a href='".  sk_site_url()."/?m=article&a=tag&tag=" . $tag . "'>" . $tag . "</a>   ";
            }
            ?>
        </div>
    </div>   



    <div class="col-sm-12   panel  panel-info">
        <h3>友情链接</h3>
        <div class="panel-body tags">
                <a href="http://www.google.com" target="_blank">Google</a>
        </div>
    </div>   

</div>

  
<script>
 
        $(document).ready(function() {
            var tags_a = $(".tags a");
            tags_a.each(function() {
               var colorStr = Math.floor(Math.random() * 0xFFFFFF).toString(16).toUpperCase();
               var color =  "#" + "000000".substring(0, 6 - colorStr) + colorStr;
                $(this).css("color",color);
                $(this).mouseover(function(){
                      $(this).animate({"backgroundColor":"#000"},300);
                });
                 $(this).mouseout(function(){
                    
                      $(this).animate({"backgroundColor":"#fff"},300);
                });
            });
            
            
            
            
        })
       

   


</script>