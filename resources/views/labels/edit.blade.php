@extends('layout')

@section('content')
<h1>Label bearbeiten</h1>
<form action="{{ route('labels.update', $label->id) }}" method="POST" class="d-flex flex-column">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Label Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $label->name) }}" required>
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-success">Label speichern</button>
        <a href="{{ route('labels.index') }}" class="btn btn-secondary">Zurück</a>
    </div>
</form>
@endsection