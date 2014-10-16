<?php

//--------------- PUBLIC ---------------// 
//调用option
function sk_option($meta_key, $type = 'public') {
    return M('option')->where("meta_key='$meta_key' AND type='$type'")->getField('meta_value');
}

/**
 * meta 
 * @return string
 */
//调用meta
function sk_meta($meta_key, $type = 'public') {
    return M('meta')->where("meta_key='$meta_key' AND type='$type'")->getField('meta_value');
}

/**
 * 检查是否存在这个key
 * @param type $meta_key
 * @return type
 */
function sk_check_meta($meta_key) {
    return M('meta')->where("meta_key='$meta_key'")->getField('meta_key');
}

//网站地址
function sk_site_url() {
	return M('option')->where("meta_key='site_url'")->getField('meta_value');
}

;

//模板目录
function sk_theme_url() {
    return sk_site_url() . '/Theme/default';
}

//加载公共模板
function sk_template_part($name) {
    echo W("Common/Public/index", array($name));
}

//加载评论模板
function sk_template_comment($articleid) {
    echo W("Common/Public/comment", array($articleid));
}

//加载文章模板
function sk_template_articlelist($tag) {
    echo W("Common/Public/articlelist", array($tag));
}

function sk_islogin() {
    $value = $_SESSION['admin_user'];
    if ($value == "aikangs") {
        return true;
    } else {
        return false;
    }
}

////加载php文件
//function mc_template($name) {
//	require(THEME_PATH.$name.'.php');
//}
//当前页面地址
function sk_page_url() {
    $url = (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ? 'https://' : 'http://';
    $url .= $_SERVER['HTTP_HOST'];
    $url .= isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : urlencode($_SERVER['PHP_SELF']) . '?' . urlencode($_SERVER['QUERY_STRING']);
    return $url;
}

;

//获取用户真实IP
function sk_user_ip() {
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
        $ip = getenv("HTTP_CLIENT_IP");
    } elseif (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    } elseif (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
        $ip = getenv("REMOTE_ADDR");
    } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        $ip = "unknown";
    };
    return $ip;
}

;

//全站标题
function sk_title() {
    if (MODULE_NAME == 'Home') {
        $title = '首页 - ' . sk_meta('site_title');
    } elseif (MODULE_NAME == 'Article') {
        if (ACTION_NAME == 'index') {
            $title = '全部文章 - ' . sk_meta('site_title');
        } elseif (ACTION_NAME == 'single') {
            $title = sk_get_page_field($_GET['id'], 'title') . ' - ' . sk_meta('site_title');
        } elseif (ACTION_NAME == "tag") {
            $title = $_GET['tag'] . ' - ' . sk_meta('site_title');
        } else {
            $title = sk_option('site_title');
        }
    } elseif (MODULE_NAME == 'Page') {
        if (ACTION_NAME == 'about') {
            $title = '关于我 - ' . sk_meta('site_title');
        }
//        elseif(ACTION_NAME == 'about'){
//            $title = '联系我 - ' . sk_option('site_name');
//        }
    } else {
        $title = sk_meta('site_title') . sk_meta('site_title');
    };
    return $title;
}

function sk_meta_seo() {
    $keywords = sk_meta("site_keywords"); //"java,php,WEB前端,web前端开发,javascript,HTML,css,技术随笔";//mc_option('article_keywords');
    $description = sk_meta("site_description"); //mc_option('article_description');
    $meta .= '<meta name="keywords" content="' . $keywords . '">';
    $meta .= '<meta name="description" content="' . $description . '">';
    return $meta;
}

//HTML危险标签过滤
function sk_remove_html($str) {
    $str = htmlspecialchars_decode($str);
    $str = preg_replace("/\s+/", " ", $str); //过滤多余回车 
    $str = preg_replace("/<[ ]+/si", "<", $str); //过滤<__("<"号后面带空格) 

    $str = preg_replace("/<\!--.*?-->/si", "", $str); //注释 
    $str = preg_replace("/<(\!.*?)>/si", "", $str); //过滤DOCTYPE 
    $str = preg_replace("/<(\/?html.*?)>/si", "", $str); //过滤html标签 
    $str = preg_replace("/<(\/?head.*?)>/si", "", $str); //过滤head标签 
    $str = preg_replace("/<(\/?meta.*?)>/si", "", $str); //过滤meta标签 
    $str = preg_replace("/<(\/?body.*?)>/si", "", $str); //过滤body标签 
    $str = preg_replace("/<(\/?link.*?)>/si", "", $str); //过滤link标签 
    $str = preg_replace("/<(\/?form.*?)>/si", "", $str); //过滤form标签 
    $str = preg_replace("/cookie/si", "COOKIE", $str); //过滤COOKIE标签 

    $str = preg_replace("/<(applet.*?)>(.*?)<(\/applet.*?)>/si", "", $str); //过滤applet标签 
    $str = preg_replace("/<(\/?applet.*?)>/si", "", $str); //过滤applet标签 

    $str = preg_replace("/<(style.*?)>(.*?)<(\/style.*?)>/si", "", $str); //过滤style标签 
    $str = preg_replace("/<(\/?style.*?)>/si", "", $str); //过滤style标签 

    $str = preg_replace("/<(title.*?)>(.*?)<(\/title.*?)>/si", "", $str); //过滤title标签 
    $str = preg_replace("/<(\/?title.*?)>/si", "", $str); //过滤title标签 

    $str = preg_replace("/<(object.*?)>(.*?)<(\/object.*?)>/si", "", $str); //过滤object标签 
    $str = preg_replace("/<(\/?objec.*?)>/si", "", $str); //过滤object标签 

    $str = preg_replace("/<(noframes.*?)>(.*?)<(\/noframes.*?)>/si", "", $str); //过滤noframes标签 
    $str = preg_replace("/<(\/?noframes.*?)>/si", "", $str); //过滤noframes标签 

    $str = preg_replace("/<(i?frame.*?)>(.*?)<(\/i?frame.*?)>/si", "", $str); //过滤frame标签 
    $str = preg_replace("/<(\/?i?frame.*?)>/si", "", $str); //过滤frame标签 

    $str = preg_replace("/<(script.*?)>(.*?)<(\/script.*?)>/si", "", $str); //过滤script标签 
    $str = preg_replace("/<(\/?script.*?)>/si", "", $str); //过滤script标签 
    $str = preg_replace("/javascript/si", "Javascript", $str); //过滤script标签 
    $str = preg_replace("/vbscript/si", "Vbscript", $str); //过滤script标签 
    $str = preg_replace("/on([a-z]+)\s*=/si", "On\\1=", $str); //过滤script标签 
    $str = preg_replace("/&#/si", "&＃", $str); //过滤script标签

    return $str;
}

//--------------- PUBLIC ---------------//
//调用Article字段
function sk_get_page_field($id, $for) {
    if ($for == 'title') {
        return M('article')->where("id='$id'")->getField('title');
    };
}

;

function sk_get_article_tag() {
    $temp = M('article')->where("type='article'")->field('tag')->select();
    $res = array();
    foreach ($temp as $key => $value) {
        foreach (explode(",", $value["tag"]) as $k => $v) {
            $res[] = $v;
        }
    }


    return array_unique($res);
}

function sk_get_link() {
    $link = M('link')->select();
    return $link;
}

function findChild(&$arr, $id) {
    $childs = array();
    foreach ($arr as $k => $v) {
        if ($v['commentid'] == $id) {
            $childs[] = $v;
        }
    }
    return $childs;
}

function build_tree($root_id, $rows) {

    $childs = findChild($rows, $root_id);
    if (empty($childs)) {
        return null;
    }
    foreach ($childs as $k => $v) {
        $rescurTree = build_tree($v[id], $rows);
        if (null != $rescurTree) {
            $childs[$k]['childs'] = $rescurTree;
        }
    }
    return $childs;
}

?>
