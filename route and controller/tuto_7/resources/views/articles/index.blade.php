
@extends('layouts.app')
@section('content')


    <h1>Liste des Articles</h1>
    <button><a href="/articles/create"> create des article</a></button>
    <ul>
        @foreach ($articles as $article)
        <li>
         {{$article['title']}}
            <p>{{ $article['content']}}</p>
            <button><a href="/articles/{{$article['id']}}">afficher details</a></button>
        </li>
        
        @endforeach
    </ul>

 
    
    @endsection