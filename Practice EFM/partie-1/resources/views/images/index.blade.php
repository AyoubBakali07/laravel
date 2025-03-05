@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Images de Motivation</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Employé</th>
                <th>Vues</th>
                <th>Messages de Soutien</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
                <tr>
                    <td><img src="{{ asset('storage/' . $image->path) }}" width="100" alt="Motivation Image"></td>
                    <td>{{ $image->employe->name }}</td>
                    <td>{{ $image->views }}</td>
                    <td>
                        <ul>
                            @foreach($image->supportMotivation as $support)
                                <li>
                                    {{ $support->message }} - Vues : {{ $support->views }}
                                    <br>
                                    Types de motivation :
                                    @foreach($support->typeMotivation as $type)
                                        <span class="badge bg-primary">{{ $type->name }}</span>
                                    @endforeach
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
