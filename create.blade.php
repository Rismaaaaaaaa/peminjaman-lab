@extends('layouts.user_type.auth')

@section('content')
    <div class="container">
        <h2>Create Laboratory</h2>

        <form action="{{ route('laboratories.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="capacity">Capacity:</label>
                <input type="number" name="capacity" id="capacity" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="equipment">Equipment:</label>
                <textarea name="equipment" id="equipment" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Laboratory</button>
        </form>
    </div>
@endsection
