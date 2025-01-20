@extends('layouts.app')

@section('content')
@php
$user = Auth::user();
@endphp
<div class="container">
    <h1>Tableau de Bord</h1>
    <p>Bienvenue, {{ $user->name }} !</p>
    <p>Date de création du compte : {{ $user->created_at->format('d/m/Y') }}</p>

    <h2>Vos Articles</h2>
    <ul>
        @forelse ($user->articles as $article)
            <li>{{ $article->title }} (Créé le {{ $article->created_at->format('d/m/Y') }})</li>
        @empty
            <li>Vous n'avez aucun article.</li>
        @endforelse
    </ul>
</div>
@endsection
