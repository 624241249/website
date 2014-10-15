<?php

namespace Admin\Controller;

use Think\Controller;

import('ORG.Util.Page'); // 导入分页类

class IndexController extends Controller {

    public function login() {
        if (IS_POST) {
            $name = I('param.user_name');
            $password = I('param.user_password');

            if ($name == "aikangs" && $password == "yzwl!@#") {
//                session('admin_user', $name);  //设置session
                $_SESSION['admin_user'] = $name;
                $this->success('登录成功', "/?m=admin&a=index");
            } else {
                $this->error('登录失败', "/?m=admin&a=login");
            }
        } else {
            $this->theme(sk_option('theme'))->display('Admin/login');
        }
    }

    public function loginOut() {
//        session('admin_user', "");  //设置session
        $_SESSION['admin_user'] = "";
        $this->theme(sk_option('theme'))->display('Admin/login');
    }

    public function index() {

        if (!sk_islogin()) {
            $this->success('请登录', "/?m=admin&a=login");
        } else {
            $this->theme(sk_option('theme'))->display('Admin/index');
        }
    }

    /**
     * 通过ID获取文章
     * @param type $id 文章ID
     */
    public function edit($id = 1) {
        if (!sk_islogin()) {
            $this->success('请登录', "/?m=admin&a=login");
        } else {
            if (!is_numeric($id)) {
                $this->error('参数错误');
            }
//  mc_set_views($id);
            $this->article = M('article')->where("id='$id' and type='article'")->select();
            $this->theme(sk_option('theme'))->display('Admin/articleedit');
//       $this->display('Article/single'); 
//        $this->show();
        }
    }

    /**
     * 新增文章
     * @param type $id 文章ID
     */
    public function add($id = 1) {
        if (!sk_islogin()) {
            $this->success('请登录', "/?m=admin&a=login");
        } else {
            $this->theme(sk_option('theme'))->display('Admin/articleedit');
        }
    }

    /**
     * 保存
     */
    public function save() {
        if (!sk_islogin()) {
            $this->success('请登录', "/?m=admin&a=login");
        } else {
            if (IS_POST) {
                $page['id'] = I('param.articleid');
                $page['title'] = I('param.title');
                $page['summary'] = I('param.summary');
                $page['tag'] = I('param.tag');
                $page['body'] = I('param.body');
                $page['created'] = date('Y-m-d H:i:s');

                $page['type'] = I('param.type');


                if ($page['id'] == "") {
                    $result = M('article')->data($page)->add();
                } else {
                    $result = M('article')->data($page)->save();
                }

                $this->success('发布成功.');
            } else {
                $this->error('你干啥呢？');
            }
        }
    }

    /**
     * 删除
     */
    public function delete($id) {
        if (!sk_islogin()) {
            $this->success('请登录', "/?m=admin&a=login");
        } else {
            if (!is_numeric($id)) {
                $this->error('参数错误');
            }
            $article = M("article");
            $result = $article->where('id=' . $id)->delete();
            if ($result) {
                $this->success('删除成功.');
            } else {
                $this->error('删除失败，请重试.');
            }
        }
    }

    /*     * *************************************************************************************************** */

    /**
     * 获取所有留言
     */
    public function comments() {
        if (!sk_islogin()) {
            $this->success('请登录', "/?m=admin&a=login");
        } else {
            $comments = M('comment')->select();


            $this->comments = $comments;

//        print_r($comments);
//        die;

            $this->display("Admin:commentlist");
        }
    }

    /**
     * 删除
     */
    public function comment_delete($id) {
        if (!sk_islogin()) {
            $this->success('请登录', "/?m=admin&a=login");
        } else {
            if (!is_numeric($id)) {
                $this->error('参数错误');
            }
            $article = M("comment");
            $result = $article->where('id=' . $id)->delete();
            if ($result) {
                $this->success('删除成功.');
            } else {
                $this->error('删除失败，请重试.');
            }
        }
    }

    /**
     * 回复
     */
//    public function comment_reply() {
//        if (!sk_islogin()) {
//            $this->success('请登录', "/?m=admin&a=login");
//        } else {
//            $this->theme(sk_option('theme'))->display('Admin/commentreply');
//        }
//    }

    /*     * ****************************************************************************************** */

    /**
     * Setting...
     */
    public function setting($key = 'site_title') {
        if (!sk_islogin()) {
            $this->success('请登录', "/?m=admin&a=login");
        } else {
            $this->value = sk_meta($key);
            $this->theme(sk_option('theme'))->display('Admin/setting');
        }
    }

    public function setting_save($key = 'site_title') {
        if (!sk_islogin()) {
            $this->error('请登录', "/?m=admin&a=login");
        } else {
            if (IS_POST) {
                if ($key != "") {
                    $page['meta_key'] = $key;
                    $page['meta_value'] = I('param.value');
                    $page['type'] = "public";


                    if (sk_check_meta($key) == "") {
                        $result = M('meta')->data($page)->add();
                    } else {
                        $result = M('meta')->data($page)->save();
                    }
                    $this->success('修改成功.');
                }else{
                      $this->error('参数错误');
                }
            } else {
                $this->error('你干啥呢？');
            }


           // $this->theme(sk_option('theme'))->display('Admin/setting');
        }
    }

}

