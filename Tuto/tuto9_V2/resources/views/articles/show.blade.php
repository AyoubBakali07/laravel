@extends('layouts.app')
@section('content')
<h1>{{$article['title']}}</h1>
<p>{{$article['content']}}</p>
<button><a href="/articles/{{$article['id']}}/edit">modifier</a></button>
<form action="/articles/{{$article['id']}}" method ="POST">
    @csrf
    @method('DELETE')
    <button type="submit"> supprimer</button>
</form>
<a href="/articles">Retour à la liste</a>
@endsection