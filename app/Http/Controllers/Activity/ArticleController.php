<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Activity;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::paginate(10);
        $activities = Activity::get();
        return view('activity.articles.index', compact('articles', 'activities'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Article::create($request->all());
        return back()->with('confirmation','Registrado Correctamente');
    }

    public function show(Article $article)
    {
        //
    }

    public function edit(Article $article)
    {
        //
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return back()->with('confirmation','Actualizado Correctamente');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return back()->with('confirmation', 'Eliminado Correctamente');
    }
}
