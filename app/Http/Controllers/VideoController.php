<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Log;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
       
    }

    public function index()
    {
        $videos = Video::paginate(4); // Pagina 4 vídeos por página
        return view('videos.index', compact('videos'));
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'required|string|url',
        ]);

        Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $request->video_url,
        ]);

        return redirect()->route('home')->with('success', 'Vídeo adicionado com sucesso!');
    }

        
}

