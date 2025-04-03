@extends('layout')

@section('content')
<h1>Labels</h1>

<div class="row">
    @foreach ($labels as $label)
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"> <a href="{{ route('labels.show', $label->id) }}">{{ $label->name }}</a></h5>
                <a href="{{ route('labels.edit', $label->id) }}" class="btn btn-warning">Bearbeiten</a>
                <form action="{{ route('labels.destroy', $label->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Löschen</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection