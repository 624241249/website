<?php

namespace Common\Widget;

use Think\Controller;

class PublicWidget extends Controller {

    public function index($name) {

        $tags = sk_get_article_tag();
        $links = sk_get_link();
        $this->links = $links;
        $this->tags = $tags;

        $this->display("Public:$name");
    }

    public function comment($articleid) {
        $comments = M('comment')->where("articleid='" . $articleid . "'")->select();

        $tree = build_tree(0, $comments);
        $this->comments = $tree;
        $this->articleid = $articleid;

        $this->display("Public:comment");
    }

    public function articleList($tag = "") {
        /**
         *  初始化文章
         */
        $Article = M('article'); // 实例化Data数据对象

        $map['tag'] = array('like', "%" . $tag . "%");
        $map['type'] = array('like', "article");

        $count = $Article->where($map)->count(); // 查询满足要求的总记录数 $map表示查询条件

        $Page = new \Think\Page($count, 7); // 实例化分页类 传入总记录数(这是根据@979137的意见修改的,这个建议非常好!)

        $show = $Page->show(); // 分页显示输出
        // 进行分页数据查询

        $orderby['id'] = 'desc';

        $list = $Article->order($orderby)->limit($Page->firstRow . ',' . $Page->listRows)->where($map)->select();

        foreach ($list as $key => $value) {
            $comments_count = M('comment')->where("articleid='" . $value['id'] . "'")->count();
            $list[$key]['comments_count'] = $comments_count;
        }

        $this->assign('article', $list); // 赋值数据集


        $next_page_url = "?m=Article&c=Index&a=index&p=";
        $this->assign('islastpage', "0");
        if ($Page->nowPage < 1) {
            $next_page_url .= 1;
        } else if ($Page->nowPage < $Page->totalPages) {
            $next_page_url .= $Page->nowPage + 1;
        } else if ($Page->nowPage >= $Page->totalPages) {
            $next_page_url .= $Page->totalPages;
            $this->assign('islastpage', "1");
        }

        $this->assign('next_page_url', $next_page_url); // 赋值分页输出

        $this->display("Public:articlelist");
    }

}
