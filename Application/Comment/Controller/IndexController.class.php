<?php

namespace Comment\Controller;

use Think\Controller;

class IndexController extends Controller {

    public function index() {

        if (IS_POST) {

            $page['username'] = I('param.username');
            $page['email'] = I('param.email');
            $page['website'] = I('param.website');

            $page['content'] = sk_remove_html(I('param.comment_content'));

            $page['postdate'] = strtotime("now");
            
              $page['commentid'] = I('param.commentid');
            $page['articleid'] = I('param.articleid');
           $result = M('comment')->data($page)->add();
           $this->success('发布成功，请耐心等待审核',"/?m=article&a=single&id=". $page['articleid']."#comment");
        }else{
            
        }
    }

}
