<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function index()
    {
        $response = Http::get('https://newsapi.org/v2/top-headlines', [
            'country' => 'br',
            'apiKey' => env('NEWS_API_KEY'),
        ]);

        $articles = $response->json()['articles'];

        return view('news.index', compact('articles'));
    }
}
