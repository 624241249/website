<?php

namespace Comment\Controller;

use Think\Controller;

class IndexController extends Controller {

    public function index() {

        if(IS_POST){
            print_r("POST");
        }
        print_r($_POST);
        die;
    }

   
    
    
    

}
