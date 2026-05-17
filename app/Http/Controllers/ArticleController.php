<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index() {
        return Article::select([
            'id',
            'title',
            'image'
        ])->get();
    }

    public function show(Article $article) {
        if ( auth('sanctum')->user() ) {
            $article->title = 'Вы просматриваете страницу как авторизованный пользователь ' . $article->title;
        }
        return $article;
    }
}
