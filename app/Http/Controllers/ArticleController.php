<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ArticleController extends BaseController {
    public function __construct(Request $request){

    }
    public function list(){
        return view('article/list');
    }
    public function view($site_code, $article_id){
        // $article_id = Route::current()->getParameter('article_id');
        // $site_code = Route::current()->getParameter('site_code');
        echo '/'.$site_code.'/'.$article_id;
        return view('article/view');
    }
}
