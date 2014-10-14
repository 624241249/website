<?php

namespace Article\Controller;

use Think\Controller;

import('ORG.Util.Page'); // 导入分页类

class IndexController extends Controller {

    public function index() {
        /**
         *  初始化文章
         */
        /*
        $Article = M('article'); // 实例化Data数据对象

        $count = $Article->where("type='article'")->count(); // 查询满足要求的总记录数 $map表示查询条件

        $Page = new \Think\Page($count, 1); // 实例化分页类 传入总记录数(这是根据@979137的意见修改的,这个建议非常好!)

        $show = $Page->show(); // 分页显示输出
        // 进行分页数据查询

        $orderby['id'] = 'desc';

        $list = $Article->order($orderby)->limit($Page->firstRow . ',' . $Page->listRows)->where("type='article'")->select();

        $this->assign('article', $list); // 赋值数据集
        
       
        $next_page_url = "?m=Article&c=Index&a=index&p=";
         $this->assign('islastpage', "0");
         if ($Page->nowPage < 1) {
                $next_page_url .= 1;
            }
            else if ($Page->nowPage < $Page->totalPages) {
                $next_page_url .= $Page->nowPage + 1;
            } else if ($Page->nowPage >= $Page->totalPages) {
                $next_page_url .= $Page->totalPages;
                $this->assign('islastpage', "1");
            }
 
 $this->assign('next_page_url', $next_page_url); // 赋值分页输出
        
//        print_r($Page);
//        $article = M("article")->where("type='article'")->select();
//
//        $this->article = $article;
 * */
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
        $this->article = M('article')->where("type='" . $tag . "'")->select();
        $this->theme(sk_option('theme'))->display('Article/single');
    }

}
