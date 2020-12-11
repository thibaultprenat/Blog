@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Vous êtes maintenant connécté') }}

                    <div>
                        <a type="button"
                            class="border border-purple-500 bg-purple-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-purple-600 focus:outline-none focus:shadow-outline"
                            href="{{ URL::action('PostController@index') }}">Continuer
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection