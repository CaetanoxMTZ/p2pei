@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Adicionar Vídeo</div>

                <div class="card-body">
                    
                        <form action="{{ route('videos.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Título do Vídeo:</label>
                                <input type="text" name="title" class="form-control" id="title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Descrição:</label>
                                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="video_url">URL do Vídeo:</label>
                                <input type="text" name="video_url" class="form-control" id="video_url" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar Vídeo</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
