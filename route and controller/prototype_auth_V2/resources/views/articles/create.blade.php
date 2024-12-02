@extends('layouts')
@section('content')

<h2>cree un article</h2>
<form action="/articles/create" method="GET">
    @csrf
    <label for="">title:</label>
    <input type="text">

    <label for="">Content:</label>
    <input type="text">

    <button type="submite">Add</button>
</form>

@endsection