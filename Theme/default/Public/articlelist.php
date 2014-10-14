 <div class="col-sm-8 ">
            <div class="curr_page">
                <?php
                foreach ($article as $key => $value) {
                    ?>
                    <div class="col-sm-12   panel  panel-info">
                        <h3><a href="<?php echo sk_site_url() ?>/?m=article&a=single&id=<?php echo $value['id'] ?>"><?php echo $value["title"] ?></a></h3>
                        <div class="panel-body">
                            <?php echo $value["summary"] ?>
                        </div>
                        <div class="row panel-body">
                            <div class="col-sm-3 "> <?php echo $value["created"] ?></div>
                            <div class="col-sm-5 "><?php
                                foreach (explode(",", $value["tag"]) as $key => $tag) {
                                    echo " <a href='" . sk_site_url() . "/?m=article&a=tag&tag=" . $tag . "'>#" . $tag . "</a>   ";
                                }
                                ?> </div>
                            <div class="col-sm-2 "><a href="<?php echo sk_site_url() ?>/?m=article&a=single&id=<?php echo $value['id'] ?>">阅读全文</a></div>
                            <div class="col-sm-2 "><a href="<?php echo sk_site_url() ?>/?m=article&a=single&id=<?php echo $value['id'] ?>#comment">评论 <span class="badge"><?php echo $value['comments_count']?></span></a></div>
                        </div>
                    </div>   
                    <?php
                }
                ?>
            </div>
            <div id="loading" class="text-center">

            </div>

            <div class="col-sm-12 ">
                <button type="button" id="btn_ajx_page" data-islastpage ="<?php echo $islastpage ?>" data-url="<?php echo $next_page_url ?>" class="btn btn-primary btn-lg btn-block">加载更多</button>
            </div>




        </div>

<script>
    $(function() {
        $("#btn_ajx_page").click(function() {        
            var islastpage = $(this).data("islastpage");
            var url = $(this).data("url");
            if (islastpage == 1) {  //如果没有输据了
                $("#btn_ajx_page").attr('disabled',"true");
                $("#btn_ajx_page").html("没有更多了");
            
                return false;
            }

            $("#loading").html('<img src="<?php echo sk_theme_url(); ?>/image/loading.gif" />');

            $.ajax({
                url: url,
                type: "GET",
                beforeSend: function(XMLHttpRequest) {
                    //ShowLoading();

                    $("#loading").html('<img src="<?php echo sk_theme_url(); ?>/image/loading.gif" />');

                },
                error: function() {
//                    alert("服务器内部错误！");
                    $("#loading").html('error');

                },
                success: function(data) {
                    $("#btn_ajx_page").data("url", $(data).find('#btn_ajx_page').data('url'));
                    $("#btn_ajx_page").data("islastpage", $(data).find('#btn_ajx_page').data('islastpage'))
                    $(".curr_page:last").append($(data).find('.curr_page'));
                   
                    $(".curr_page:last").fadeOut(0, function() {
                        $("#loading").html('');
                    }).fadeIn(500);



                },
                complete: function(XMLHttpRequest, textStatus) {
                    //HideLoading();
                }
            });

        });

    });

</script>