<!-- news/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Últimas Notícias</div>

                    <div class="card-body">
                        @foreach ($articles as $article)
                            <div style="background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 8px; padding: 15px; margin-bottom: 20px;">
                                <h4 style="margin-bottom: 10px;">{{ $article['title'] }}</h4>
                                <p style="color: #666; font-size: 0.9em; line-height: 1.6;">{{ $article['description'] }}</p>
                                @if (!empty($article['url']))
                                    <a href="{{ $article['url'] }}" target="_blank" style="color: #007bff; text-decoration: none;">Leia mais</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
