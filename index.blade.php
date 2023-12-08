@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h2>Laboratories</h2>
                            <a href="{{ route('laboratories.create') }}" class="btn btn-primary">Create Laboratory</a>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">

                                <table class="table mt-3">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Capacity</th>
                                            <th>Description</th>
                                            <th>Equipment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($laboratories as $lab)
                                            <tr>
                                                <td>{{ $lab->id }}</td>
                                                <td>{{ $lab->name }}</td>
                                                <td>{{ $lab->capacity }}</td>
                                                <td>{{ $lab->description }}</td>
                                                <td>{{ $lab->equipment }}</td>
                                                <td>
                                                    <a href="{{ route('laboratories.show', $lab->id) }}" class="btn btn-info">View</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">No laboratories found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
