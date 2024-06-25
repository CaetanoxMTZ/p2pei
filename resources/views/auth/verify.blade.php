@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique seu endereço de email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Um link para redefinir sua senha foi enviada ao seu email') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, verifique seu email para o link de recuperação!') }}
                    {{ __('Se você não recebeu esse email:') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('clique aqui para reenviar') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
