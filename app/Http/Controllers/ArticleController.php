<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

class ArticleController extends BaseController {
    public function list(){
        return view('article/list');
    }
    public function view(){
        return view('article/view');
    }
}
