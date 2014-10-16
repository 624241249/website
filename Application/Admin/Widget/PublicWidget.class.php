<?php

namespace Admin\Widget;

use Think\Controller;

class PublicWidget extends Controller {

     
    /**
     * admin
     */
    
      public function admin_nav() {
      
        $this->display("Admin:nav");
    }

    
       /**
     * admin
     */
    
      public function admin_articlelist() {
            /**
         *  初始化文章
         */
         
        $Article = M('article'); // 实例化Data数据对象

        $count = $Article->where("type='article'")->count(); // 查询满足要求的总记录数 $map表示查询条件

        $Page = new \Think\Page($count, 10); // 实例化分页类 传入总记录数(这是根据@979137的意见修改的,这个建议非常好!)

        $show = $Page->show(); // 分页显示输出
        // 进行分页数据查询

        $orderby['id'] = 'desc';

        $list = $Article->order($orderby)->limit($Page->firstRow . ',' . $Page->listRows)->where("type='article'")->select();

        $this->assign('article', $list); // 赋值数据集
         
 
 $this->assign('page', $show); // 赋值分页输出
        
//        print_r($Page);
//        $article = M("article")->where("type='article'")->select();
//
//        $this->article = $article;
        $this->display("Admin:articlelist");
    }

}