<?php
namespace Home\Widget;
use Think\Controller;
class PublicWidget extends Controller {
    public function index($name){
        
        $tags = sk_get_article_tag();
        
         
        $this->tags = $tags;
      
        $this->display("Public:$name");
    }
    
    
    public function comment($articleid){
          $this->comments = M('comment')->where("articleid='".$articleid."'")->select();
                 $this->display("Public:comment");
    }
}