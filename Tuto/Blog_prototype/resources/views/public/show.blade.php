@extends('layouts.app')
@section('content')


<div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
    <!-- Titre de la Carte -->
    <div class="px-6 py-4 border-b">
      <h2 class="font-bold text-xl text-gray-800">Titre de la Carte</h2>
    </div>
    <!-- Contenu de la Carte -->
    <div class="px-6 py-4">
      <p class="text-gray-700 text-base">
        Voici le contenu de la carte. Vous pouvez y inclure du texte, des images ou tout autre élément HTML.
      </p>
    </div>
    <!-- Pied de la Carte -->
    <div class="px-6 py-4 border-t">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Action
      </button>
    </div>
  </div>

@endsection