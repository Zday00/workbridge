@extends('dashboard.layouts.app')
@section('content')
    <h1>Liste des missions</h1>

    @if ($missions->isEmpty())
        <p>Aucune mission trouvée.</p>
    @else
        <ul>
            @foreach ($missions as $mission)
                <li>
                    <strong>{{ $mission->title }}</strong><br>
                    {{ $mission->description }}<br>
                    Lieu : {{ $mission->location }}<br>
                    Statut : {{ $mission->status }}<br>
                    Date limite : {{ $mission->deadline }}
                </li>
            @endforeach
        </ul>
    @endif
@endsection
