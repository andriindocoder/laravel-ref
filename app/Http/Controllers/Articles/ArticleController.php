<?php

namespace App\Http\Controllers\Articles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(){
    	$articles = Article::all();
    
    	return Fractal::includes('author')
    		->collection($articles, new ArticleTransformer);
    }
}
