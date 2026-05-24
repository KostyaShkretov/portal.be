<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return Article::select([
            'id',
            'title',
            'image',
        ])->get();
    }

    public function store(Request $request)
    {
        $data =  $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:65000',
            'image' => 'max:255'
        ]);
        Article::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'image' => $data['image'],
        ]);
        return [
            'success' => true
        ];
    }

    public function delete(Article $article)
    {
        $article->delete();
        return [
            'success' => true
        ];
    }
}
