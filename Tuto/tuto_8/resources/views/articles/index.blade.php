
@extends('layouts.app')
@section('title', 'list des articles')

@section('sidebar')
<h3>categories</h3>
<ul>
    <li>laravel</li>
    <li>PHP</li>
    <li>Programmation Web</li>
</ul>
@endsection

@section('content')
@include('partials.flash-message')



    <h1>Liste des Articles</h1>
    <button><a href="/articles/create"> create des article</a></button>
    <ul>
        @foreach ($articles as $article)
        <x-article-card :article="$article"/>
        <li>
         {{$article['title']}}
            <p>{{ $article['content']}}</p>
            <button><a href="/articles/{{$article['id']}}">afficher details</a></button>
        </li>
        
        @endforeach
    </ul>

 
    
    @endsection