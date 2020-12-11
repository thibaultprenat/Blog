@extends('layouts.app')

<body>

    <div class="max-w-4xl px-10 my-4 py-6 bg-white rounded-lg shadow-md">


        <div class="mt-2">
            <a class="text-2xl text-gray-700 font-bold hover:text-gray-600" href="#">{{ $post->title }}</a>
            <p class="mt-2 text-gray-600">{{ $post->content }}</p>
        </div>
        <div class="flex justify-between items-center mt-4">

            <div>
                <a class="flex items-center" href="#">
                    <img class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block"
                        src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=373&q=80"
                        alt="avatar">
                    <h1 class="text-gray-700 font-bold">{{ $post->user->name }}</h1>
                </a>
            </div>
            <div>
                <form action="{{URL::action('PostController@delete', $post->id )}}" method='DELETE'>
                    <a class="bg-transparent hover:bg-red text-red-dark font-semibold hover:text-white py-2 px-4 border border-red hover:border-transparent rounded-full mr-2"
                        href="{{ URL::action('PostController@edit', $post->id) }}">ÉDITER</a>

                    <input type="submit" value="Suppimer"
                        class="bg-transparent hover:bg-red text-red-dark font-semibold hover:text-white py-2 px-4 border border-red hover:border-transparent rounded-full mr-2">
                </form>
            </div>
        </div>
    </div>
    <h5>Commentaires</h5>
    @forelse($post->comments as $comment)
    <div class="card mb-2">
        <div class="card-body">
            {{$comment->contenu }}
            <div class="d-flex justify-content-between align-items-center">
                <small>Posté le {{ $comment ->created_at->format('d/m/y ')}}</small>
                <span class="badge badge-primary">{{$comment->user->name}}</span>
                <form action="{{route('comments.destroy', $comment)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>

    @empty

    <div class="alert alert-info">Aucun Commentaire pour ce sujet</div>

    @endforelse

    <form action="{{route('comments.store', $post)}}" method="POST" class="mt-3">
        @csrf
        <div class="form-group">
            <label for="content">Votre commentaire </label>
            <textarea class="form-control @error ('contenu') is-invalid @enderror" name="contenu" id="contenu"
                row="5"></textarea>
            @error('content')
            <div class="invalid-feedback">{{$errors->first('contenu')}}
                @enderror
            </div>
            <div class="d-flex justify-content-center mt-2">
                <button type="submit" class="btn btn-primary">Soumettre mon commentaire</button>
            </div>
        </div>
    </form>
</body>

</html>