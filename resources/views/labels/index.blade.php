@extends('layout')

@section('content')
    <h2>Übersicht</h2>

    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">

        @foreach ($labels as $label)
            <div class="col">
                <div class="card">

                    <div class="card-header">
                        <h5><a href="{{url('/labels', ['id'=> $label->id])}}">{{$label->name}} </a></h5>
                    </div>

                <div class="card-footer d-flex justify-content-between">
                    <a class="btn btn-warning" href="/labels/{{$label->id}}/edit">Label Bearbeiten</a>
                    <form action="{{url('/labels', ['id'=> $label->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Label Löschen</button>
                    </form>
                </div>

                </div>
            </div>
        @endforeach
    </div>


        
    

@endsection