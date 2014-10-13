<?php

namespace Page\Controller;

use Think\Controller;

class IndexController extends Controller {

  
        /**
     * 通过tag获取文章列表
     * @param type $tag tag 
     */
    public function index($tag = "") {

      
        //  mc_set_views($id);
        $this->article = M('article')->where("type='".$tag."'")->select();
        $this->theme(sk_option('theme'))->display('Page/'.$tag.'');
 
    }

}
