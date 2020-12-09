@extends('layouts.app')



@section('content')
<p>
    <a href="{{ URL::action('PostController@create') }}" class="button">Créer un post</a>
</p>
@foreach($posts as $post)

<div class="post-container">
    <h3>
        <a href="{{ URL::action('PostController@view', $post->id) }}">{{ $post->title }}</a>
    </h3>
    <p>{{ $post->content }}</p>
    <i>{{ $post->user->name }}</i>
</div>
@endforeach