@extends('layout')

@section('content')
<h1>Label: {{ $label->name }}</h1>

<h3>Zu diesem Label gehören folgende Songs:</h3>
<div class="d-flex flex-wrap">
    @foreach ($songs as $song)
    <div class="card m-2" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $song->title }} <br> von: {{ $song->band }}</h5>
            <p>
                <small>
                    angelegt am : <i>{{$song->created_at}}</i><br>
                    geändert am : <i>{{$song->updated_at}}</i>
                </small>
            </p>
        </div>
    </div>
    @endforeach
</div>

<div class="d-flex justify-content-between mt-3">
    <a href="{{ route('labels.index') }}" class="btn btn-secondary">Zurück</a>
    <a href="{{ route('labels.edit', $label->id) }}" class="btn btn-warning">Bearbeiten</a>
    <form action="{{ route('labels.destroy', $label->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Löschen</button>
    </form>
</div>
@endsection