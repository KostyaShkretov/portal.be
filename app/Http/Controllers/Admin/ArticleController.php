<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index() {
        return Article::select([
            'id',
            'title',
            'image',
        ])->get();
    }

    public function delete(Article $article) {
        $article->delete();
        return [
            'success' => true
        ];
    }
}
