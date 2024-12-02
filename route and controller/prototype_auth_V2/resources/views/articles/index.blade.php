@extends('layouts')
@section('content')

@endsection
    
    <h1>Liste des Articles</h1>
    <ul>
        @foreach($articles as $article)
            <li>
                <a href="/articles/{{$article['id']}}">
                    {{$article['title']}}
                    
                </a>
            </li>
        @endforeach
    </ul>
