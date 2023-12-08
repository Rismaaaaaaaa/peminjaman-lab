@extends('layouts.user_type.auth')

@section('content')
    <div class="container">
        <h2>Laboratory Details</h2>

        <dl class="row">
            <dt class="col-sm-2">ID:</dt>
            <dd class="col-sm-10">{{ $laboratory->id }}</dd>

            <dt class="col-sm-2">Name:</dt>
            <dd class="col-sm-10">{{ $laboratory->name }}</dd>

            <dt class="col-sm-2">Capacity:</dt>
            <dd class="col-sm-10">{{ $laboratory->capacity }}</dd>

            <dt class="col-sm-2">Description:</dt>
            <dd class="col-sm-10">{{ $laboratory->description ?? 'N/A' }}</dd>

            <dt class="col-sm-2">Equipment:</dt>
            <dd class="col-sm-10">{{ $laboratory->equipment ?? 'N/A' }}</dd>
        </dl>

        <a href="{{ route('laboratories.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection