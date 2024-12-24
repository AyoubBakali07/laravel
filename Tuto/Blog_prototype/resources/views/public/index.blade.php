@extends('layouts.app')
@section('content')

@foreach($articles as $article)
<div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
    <!-- Titre de la Carte -->
    <div class="px-6 py-4 border-b">
      <h2 class="font-bold text-xl text-gray-800">{{$article->title}}</h2>
    </div>
    <!-- Contenu de la Carte -->
    <div class="px-6 py-4">
      <p class="text-gray-700 text-base">{{$article->content}}</p>
    </div>
    <!-- Pied de la Carte -->
    <div class="px-6 py-4 border-t">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Show
      </button>
    </div>
  </div>
  @endforeach

@endsection