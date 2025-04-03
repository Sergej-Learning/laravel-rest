
@extends('layout')

@section('content')
    <h2>{{ $lable->name }}</h2>
    <p>
        Label <b>{{ $label->name }}</b>
    </p>
    <p>
        <small>
            angelegt am : <i>{{$label->created_at}}</i><br>
            geändert am : <i>{{$label->updated_at}}</i>
        </small>
    </p>
@endsection