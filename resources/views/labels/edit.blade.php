@extends('layout');

@section('content')
    <h2>Label bearbeiten</h2>

    <form class="row" action="/labels/{{$label->id}}" method="post">
        @csrf
        @method('PUT')

        <div class="col-md-6">
            <div class="mb-3">
                <label for="name">Label Name</label>
                <input class="form-control" type="text" name="title" id="title" value="{{$label->name}}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="label">Label</label>
                <select class="form-select" name="label_id" id="label" >
                    @foreach ($labels as $label)
                        <option @if ($label->id ===$song->label_id) selected @endif value="{{$label->id}}">{{$label->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-5">
                <button class="btn btn-success" type="submit">Änderung Speichern</button>
            </div>
        </div>

    </form>
@endsection 