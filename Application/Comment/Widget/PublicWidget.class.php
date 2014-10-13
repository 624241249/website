<?php

namespace Comment\Widget;

use Think\Controller;

class PublicWidget extends Controller {

    public function index($name) {

        $tags = sk_get_article_tag();


        $this->tags = $tags;

        $this->display("Public:$name");
    }

    public function comment($articleid) {
        $comments = M('comment')->where("articleid='" . $articleid . "'")->select();

        $tree = build_tree(0, $comments);
        $this->comments = $tree;

        $this->display("Public:comment");
    }

}