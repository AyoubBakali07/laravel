@extends ('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Un Article</h1>
    <form action="/articles" method="POST" class="form-group">
        @csrf
        @if(isset($article))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Titre :</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                class="form-control" 
                value="{{ isset($article) ? $article->title : '' }}" 
                required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Contenu :</label>
            <textarea 
                name="content" 
                id="content" 
                class="form-control" 
                rows="5" 
                required>{{ isset($article) ? $article->content : '' }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
