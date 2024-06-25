@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vídeos Disponíveis</div>
                <div class="card-body">
                    @php
                        // Função para extrair o ID do vídeo do URL do YouTube
                        function extractYoutubeId($url) {
                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                            return $matches[1] ?? null;
                        }
                    @endphp
                    @foreach ($videos as $video)
                    <div class="mb-4">
                        <h3>{{ $video->title }}</h3>
                        <p>{{ $video->description }}</p>
                        <div class="video-container">
                            @php
                                // Obter o ID do vídeo do URL
                                $videoId = extractYoutubeId($video->video_url);
                            @endphp
                            @if ($videoId)
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allowfullscreen></iframe>
                            @else
                                <p>URL inválido: {{ $video->video_url }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach

                    <!-- Adiciona os links de paginação e botão de adicionar vídeo -->
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-center">
                            {{ $videos->links('pagination::bootstrap-4') }}
                        </div>
                        @if (auth()->check() && auth()->user()->id == 1)
                            <a href="{{ route('videos.create') }}" class="btn btn-primary">Adicionar Vídeo</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .video-container {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
        height: 0;
    }
    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .pagination {
        margin-top: 20px;
        margin-bottom: 0;
        font-size: 0.875rem; /* Ajusta o tamanho da fonte */
    }
    .d-flex.justify-content-between.align-items-center {
        margin-top: 20px;
    }
</style>
@endsection
