<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        /**
         *  初始化文章
         */
	 $articles =M("article")->where("type='article'")->select();
         
         $this->articles = $articles;

         
       // $this->show();
          $this->theme(sk_option('theme'))->display('Index/index');
    }

}
