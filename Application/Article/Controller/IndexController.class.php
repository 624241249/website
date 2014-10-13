<?php

namespace Article\Controller;

use Think\Controller;

class IndexController extends Controller {

    public function index() {
        /**
         *  初始化文章
         */
        $article = M("article")->where("type='article'")->select();
       
        $this->article = $article;

        $this->theme(sk_option('theme'))->display('Article/index');
//        $this->show();
    }

    /**
     * 通过ID获取文章
     * @param type $id 文章ID
     */
    public function single($id = 1) {
        if (!is_numeric($id)) {
            $this->error('参数错误');
        }
        //  mc_set_views($id);
        $this->article = M('article')->where("id='$id' and type='article'")->select();
        $this->theme(sk_option('theme'))->display('Article/single');
//       $this->display('Article/single'); 
//        $this->show();
    }

    /**
     * 通过tag获取文章列表
     * @param type $tag tag 
     */
    public function tag($tag = "") {

        //  mc_set_views($id);
        $map['tag'] = array('like', "%" . $tag . "%");
        $article = M('article')->where($map)->select();
 
        $this->article = $article;
        $this->theme(sk_option('theme'))->display('Article/index');
//       $this->display('Article/single'); 
//        $this->show();
    }
    
    
    
    
    
    
        /**
     * 通过tag获取文章列表
     * @param type $tag tag 
     */
    public function page($tag = "") {

      
        //  mc_set_views($id);
        $this->article = M('article')->where("type='".$tag."'")->select();
        $this->theme(sk_option('theme'))->display('Article/single');
 
    }

}
