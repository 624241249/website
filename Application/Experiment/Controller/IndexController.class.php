<?php

namespace Experiment\Controller;

use Think\Controller;

 

class IndexController extends Controller {

    public function index() {
        
        $this->theme(sk_option('theme'))->display('Experiment/index');
        
         
    }

    
}
