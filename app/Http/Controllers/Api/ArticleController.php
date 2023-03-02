<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\article;
use App\Repository\ArticleInterface;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $ArticleRepository; 

    public function __construct(ArticleInterface $ArticleRepository)
    {
        $this->ArticleRepository = $ArticleRepository;
    }

    public function index()
    {
        $articles = $this->ArticleRepository->index();
        return response()->json($articles);
    }
}
