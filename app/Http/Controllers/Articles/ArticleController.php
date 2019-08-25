<?php

namespace App\Http\Controllers\Articles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Cyvelnet\Laravel5Fractal\Facades\Fractal;
use App\Http\Requests\Articles\StoreArticleRequest;

class ArticleController extends Controller
{
    public function index(){
    	$articles = Article::all();

    	return Fractal::includes('author')
    		->collection($articles, new ArticleTransformer);
    }

    public function store(StoreArticleRequest $request){
		$article            = new Article();
		$article->author_id = $request->author->id;
		$article->title     = $request->title;
		$article->slug      = str_slug($request->title);
		$article->body      = $request->body;
		$article->save();

    	return Fractal::includes('author')
    		->item($article, new ArticleTransformer);
    }
}
