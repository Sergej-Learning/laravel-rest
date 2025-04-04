@extends('layout')

@section('content')
<h1>Label: {{ $label->name }}</h1>
<p>
    <small>
        angelegt am : <i>{{$label->created_at->format('d.m.Y H:i')}}</i><br>
        geändert am : <i>{{$label->updated_at->format('d.m.Y H:i')}}</i>
    </small>
</p>

<h3>Zu diesem Label gehören folgende Songs:</h3>
<div class="d-flex flex-wrap">
    @foreach ($songs as $song)
    <div class="card m-2" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $song->title }} <br> von: {{ $song->band }}</h5>
            <p>
                <small>
                    angelegt am : <i>{{$song->created_at->format('d.m.Y H:i')}}</i><br>
                    geändert am : <i>{{$song->updated_at->format('d.m.Y H:i')}}</i>
                </small>
            </p>
            <form 
                action="{{url('/songs/' .$song->id)}}" method="POST"
                    onsubmit="return confirm('Diesen Song wirklich löschen?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn sm">Löschen</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

<h6 class="mt-3">Neuen Song zum Label hinzufügen</h6>
<form 
    action="{{route('songs.store') }}"
    method="POST" class="mt-1 mb-3"
    >
    @csrf
    <input type="hidden"
           name="label_id"
           value="{{$label->id}}">
    <div class="input-group">
        <input type="text"
                name="title"
                class="form-control"
                placeholder="Bitte Song Titel eingeben!" 
                required
                >
        <input type="text"
               name="band"
               class="form-control"
               placeholder="Bitte Bandnamen eingeben!"
               required
               >
        <button type="submit" class="btn btn-success">Song hinzufügen</button>
    </div>

</form>

<div class="d-flex justify-content-between mt-3">
    <a href="{{ route('labels.index') }}" class="btn btn-secondary">Zurück</a>
    <a href="{{ route('labels.edit', $label->id) }}" class="btn btn-warning">Label Bearbeiten</a>
    <form action="{{ route('labels.destroy', $label->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Label Löschen</button>
    </form>
</div>
@endsection