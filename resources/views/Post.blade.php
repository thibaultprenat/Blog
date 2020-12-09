<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- styles -->
    <link href="./css/custom.css" rel="stylesheet" type="text/css">
</head>

<body>
    <a href="{{ URL::action('PostController@index') }}">Retour à la liste</a>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <i>{{ $post->user->name }} {{ $post->user->firstname }}</i>
    <p>
        <a href="{{ URL::action('PostController@edit', $post->id) }}" class="button">Editer</a>
    </p>

    <form action="{{URL::action('PostController@delete', $post->id )}}" method='DELETE'>
        <input type="submit" value="Suppimer">
    </form>

</body>

</html>