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
    <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <a href="{{ URL::action('PostController@index') }}">Retour à la liste</a>
    <h1>Créer un article</h1>

    <form action="{{ URL::action('PostController@create')}}" method='POST'>
        @csrf
        <label>Titre : </label>
        <input type="text" name="title">
        <br>
        <br>
        <label>Article :</label>
        <TEXTAREA name="content" rows=4 cols=40>test</TEXTAREA>
        <br>
        <br>

        <input type="submit" value="Créer">
    </form>
</body>

</html>