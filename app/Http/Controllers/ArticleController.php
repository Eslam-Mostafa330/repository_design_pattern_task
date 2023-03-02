<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\category;
use App\Models\User;
use App\Repository\ArticleInterface;
// use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ArticleController extends Controller
{

    private $ArticleRepository; 

    public function __construct(ArticleInterface $Article)
    {
        $this->ArticleRepository = $Article;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $articles = $this->ArticleRepository->index();
        // $articles = article::all();
        return view("admin.article.index", compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $users = User::all();
        // $user_name = Auth::user()->name;
        $categories = category::all();
        return view("admin.article.create", compact('users', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // $user_name = Auth::user()->name;
        $cover = $request->file('cover');
        $cover_name = $cover->getClientOriginalName();
        $cover->move('uploads', $cover_name);
        article::create([
            'title' => $request->title,
            'content' => $request->content,
            'cover' => $cover_name,
            'short_description' => $request->short_description,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);
        return redirect("admin/article");
    }

    /**
     * Display the specified resource.
     */
    public function show(article $article): mixed
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(article $article): mixed
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, article $article): mixed
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(article $article): mixed
    {
        //
    }
}
